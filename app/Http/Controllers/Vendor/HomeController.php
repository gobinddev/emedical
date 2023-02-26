<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Vendor;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use App\Order;
use App\UserProduct;
use App\UserProductAttribute;

class HomeController extends Controller
{
    //
    public function index()
    {
        $user_id = Auth::guard('vendor')->user()->id;

        // Fulfil Order
        $fulfill_order = Order::where('vendor_id',$user_id)->where('status',3)->get();
        $fulfill_order = count($fulfill_order);

        $last_sale = Order::from('orders as o')
                            ->select(DB::raw('CAST(o.total_price - (o.total_price * (o.commission / 100)) as DECIMAL(10,2)) as commission_price'))
                            ->where('vendor_id',$user_id)
                            ->where('status',3)
                            ->get()->sum('commission_price');


        $today_total = Order::from('orders as o')
                        ->select(DB::raw('CAST(o.total_price - (o.total_price * (o.commission / 100)) as DECIMAL(10,2)) as commission_price'))
                        ->where('vendor_id',$user_id)
                        ->whereDate('o.ordered_at',date('Y-m-d'))
                        ->where('status','<>','0')
                        ->get()->sum('commission_price');

        $stock_out = UserProductAttribute::from('user_product_attributes as ub')
                        ->distinct('ub.product_id')
                        ->select('ub.*')
                        ->join('user_products as u','u.id','=','ub.product_id')
                        ->where('u.vendor_id',$user_id)
                        ->where('ub.quantity','<',1)
                        ->groupBy('ub.product_id')
                        ->get();

        $stock_out = count($stock_out);

        $total_order = Order::from('orders as o')
                        ->select('o.*')
                        ->where('vendor_id',$user_id)
                        ->whereMonth('o.ordered_at',date('m'))
                        ->whereYear('o.ordered_at',date('Y'))
                        ->where('status','<>','0')
                        ->get();

        $total_order = count($total_order);

        $latest_orders =  Order::from('orders as o')
                                ->select('o.*',DB::raw('CAST(o.total_price - (o.total_price * (o.commission / 100)) as DECIMAL(10,2)) as commission_price'))
                                ->where('vendor_id',$user_id)
                                ->where('status','<>','0')
                                ->orderBy('o.ordered_at','desc')
                                ->get();

        $latest_products = UserProduct::where('status', '!=', 9)
                            ->where('vendor_id',$user_id)
                            ->orderBy('id', 'DESC')
                            ->get();

        $low_stocks = UserProductAttribute::from('user_product_attributes as ub')
                            ->distinct('ub.product_id')
                            ->select('ub.id','ub.product_id','u.product_title','u.category_id','u.created_at','u.status','u.quantity')
                            ->join('user_products as u','u.id','=','ub.product_id')
                            ->where('u.vendor_id',$user_id)
                            ->where('ub.quantity','<',1)
                            ->groupBy('ub.product_id')
                            ->get();

        return view('vendor_module.index',compact('fulfill_order','last_sale','today_total','stock_out','total_order','latest_orders','latest_products','low_stocks'));
    }

    public function profile()
    {
        $user_id = Auth::guard('vendor')->user()->id;
        $record = Vendor::where('id',$user_id)->first();
        $countries = DB::table('countries')->get();
        $states = DB::table('states')->where('country_id',$record->country_id)->get();
        $cities = DB::table('cities')->where('state_id',$record->state_id)->get();
        return view('vendor_module.profile',compact('record','countries','states','cities'));
    }

    public function updateProfile(Request $request)
    {
        //dd($request->file('profile-image'));
        $user_id = Auth::guard('vendor')->user()->id;
        $request->validate([
            'business_name' => 'required',
            'first_name' => 'required|regex:/^[a-zA-Z ]+$/u|min:1|max:255',
            'last_name' => 'nullable|regex:/^[a-zA-Z]+$/u|min:1|max:255',
            'image' =>'nullable|mimes:jpg,jpeg,png,gif,bmp,svg|max:20000',
        ],
        [
            'first_name.regex' => 'First Name Must Be Allowed Character & Spaces',
            'last_name.regex' => 'First Name Must Be Allowed Character',
        ]
        );

        DB::beginTransaction();
        try{
            if($request->file('image')){

                $image = $request->file('image');
                $date = date('YmdHis');
                $no = str_shuffle('123456789023456789034567890456789905678906789078908909000987654321987654321876543217654321654321543214321321211');
                $random_no = substr($no, 0, 2);
                $final_image_name = $date.$random_no.'.'.$image->getClientOriginalExtension();
                $destination_path = public_path('/uploads/vendor/profile');
                if(!File::exists($destination_path))
                {
                    File::makeDirectory($destination_path,0777,true,true);
                }

                $image->move($destination_path , $final_image_name);

            }
            else
            {
                $final_image_name = Auth::guard('vendor')->user()->image;
            }

            $data = [
                'business_name' => $request->input('business_name'),
                'first_name' => $request->input('first_name'),
                'last_name' => $request->input('last_name'),
                'name' => $request->input('first_name').' '.$request->input('last_name'),
                'image' => !empty($final_image_name)?$final_image_name:NULL,
            ];

            $query = Vendor::find($user_id)->update($data);

            if ($query) {

                DB::commit();
                Session::flash('message', 'Profile Updated Successfully !!');
                Session::flash('alert-class', 'alert-success');
            }
            else
            {
                DB::rollback();
                Session::flash('message', 'Something went wrong!');
                Session::flash('alert-class', 'alert-danger');
            }

            return redirect()->back();
        }
        catch (\Exception $e) {
            DB::rollback();
            // something went wrong
            return $e;
        }
    }

    public function changePassword(Request $request)
    {
        $user_id = Auth::guard('vendor')->user()->id;

        if($request->isMethod('get'))
        {
            return view('vendor_module.change-password');
        }

        $request->validate([
            'password' => 'required|same:confirm_password|min:5',
            'confirm_password' => 'nullable|same:password|min:5'

        ]
        );

        $pwd = $request->input('password');
        if (!preg_match("/^(?=.{10,20})(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[$@%£!]).*$/", $pwd)){

            return back()->withInput()->withErrors(['password'=>'Password must be atleast 10 characters long including (Atleast 1 uppercase letter(A–Z), Lowercase letter(a–z), 1 number(0–9), 1 non-alphanumeric symbol(‘$@%£!’) !']);
        }

        Vendor::find($user_id)->update(['password'=> Hash::make($request->input('password'))]);

        Auth::guard('vendor')->logout();

        return redirect()->route('vendor.login');
    }

    public function shipping()
    {
        return view('vendor_module.shipping');
    }
}

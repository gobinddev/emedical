<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Crypt;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        if(Auth::user()->role_id == '1'){

            $modules = DB::table('modules')
                ->where('modules.parent_id', '=', 0)
                ->where('modules.show_in_sidemenu', '=', 'yes')
                ->where('modules.status', '=', 1)
                ->orderBy('modules.display_order','ASC')
                ->get();

            foreach ($modules as $key => $value) {
                $out['name'] = $value->name;
                $out['action'] = $value->action;
                $out['icon_class'] = $value->icon_class;
                $final_out[] = $out;
            }

        } else {

            $modules = DB::table('modules')
                ->join('role_module_mapping', 'role_module_mapping.module_id', '=', 'modules.id')
                ->where('role_module_mapping.role_id', '=', Auth::user()->role_id)
                ->where('role_module_mapping.status', '=', 1)
                ->where('modules.parent_id', '=', 0)
                ->where('modules.show_in_sidemenu', '=', 'yes')
                ->where('modules.status', '=', 1)
                ->orderBy('modules.display_order','ASC')
                ->get();

            foreach ($modules as $key => $value) {
                $out['name'] = $value->name;
                $out['action'] = $value->action;
                $out['icon_class'] = $value->icon_class;
                $final_out[] = $out;
            }
        }

           Session::put('sidemenu', $final_out);

            $customer_count = DB::table('users')
                ->select('users.*', DB::raw("CONCAT_WS(' ', users.first_name, users.middle_name, users.last_name) as full_name"))
                // ->where('users.role_id', '=', 4)
                // ->where('users.status', '!=', 9)
                ->orderBy('users.id', 'DESC')
                ->count();
            $product_category_count = DB::table('product_categories')
                ->where('product_categories.status', '!=', 9)
                ->orderBy('product_categories.id', 'DESC')
                ->count();
            
            $product_count = DB::table('user_products')
                ->join('product_categories', 'product_categories.id', '=', 'user_products.category_id')
                ->orderBy('user_products.id', 'DESC')
                ->count();
          $visitors = DB::table('visitors')->count();
          $sold_product = DB::table('order_items')->sum('quantity');
          $stockcount = DB::table('user_products')->where('quantity', '<=', 5)->count();
          $totalstocks = DB::table('user_products')->sum('quantity');
          $totalOrder = DB::table('orders')->count(); 
          $pieChart = DB::table('orders')
          ->join('customer_addresses', 'customer_addresses.id', '=', 'orders.delivery_address_id') 
          ->join('countries', 'countries.id', '=', 'customer_addresses.country_id')
          ->orderby('customer_addresses.country_id')
          ->select('countries.name',DB::raw('count(customer_addresses.country_id) as count'))->get();
          
           
            return view('home', [
            'customer_count' => $customer_count,
            'product_category_count' => $product_category_count,
            'product_count' => $product_count,
            'visitors' =>$visitors,
            'sold_product'=>$sold_product,
            'stockcount'=>$stockcount,
            'totalstocks'=>$totalstocks,
            'totalorder' => $totalOrder,
            'pieChart' => $pieChart
            ]);
        
        
    }


    public function about_us()
    {

         $data = DB::table('pages')
                 ->select('about_us')
                 ->where('id',1)
                 ->first();

        return view('cms.about_us',['data' => $data]);
    }

    public function about_us_update(Request $request)
    {



         $data = [
            'about_us' => !empty($request->about_us)?$request->about_us:'',
            'created_at' => date('Y-m-d H:i:s'),

        ];


          $query = DB::table('pages')
                   ->where('id',1)
                   ->update($data);

        if ($query)
        {


            DB::commit();
            Session::flash('message', 'Appointment updated successfully!');
            Session::flash('alert-class', 'alert-success');
        } else {
            DB::rollback();
            Session::flash('message', 'Something went wrong!');
            Session::flash('alert-class', 'alert-danger');
        }
        return redirect()->intended('home');
    }


    public function terms_of()
    {

         $data = DB::table('pages')
                 ->select('terms_of')
                 ->where('id',1)
                 ->first();

        return view('cms.terms_of',['data' => $data]);
    }


     public function terms_of_update(Request $request)
    {
       $data = ['terms_of' => !empty($request->terms_of)?$request->terms_of:'',
                'created_at' => date('Y-m-d H:i:s'),];


          $query = DB::table('pages')
                   ->where('id',1)
                   ->update($data);

        if ($query)
        {


            DB::commit();
            Session::flash('message', 'Appointment updated successfully!');
            Session::flash('alert-class', 'alert-success');
        } else {
            DB::rollback();
            Session::flash('message', 'Something went wrong!');
            Session::flash('alert-class', 'alert-danger');
        }
        return redirect()->intended('home');
    }

     public function policy()
    {

         $data = DB::table('pages')
                 ->select('policy')
                 ->where('id',1)
                 ->first();



        return view('cms.policy',['data' => $data]);
    }

    public function policy_update(Request $request)
    {



         $data = [
            'policy' => !empty($request->policy)?$request->policy:'',
            'created_at' => date('Y-m-d H:i:s'),

        ];


          $query = DB::table('pages')
                   ->where('id',1)
                   ->update($data);

        if ($query)
        {


            DB::commit();
            Session::flash('message', 'Appointment updated successfully!');
            Session::flash('alert-class', 'alert-success');
        } else {
            DB::rollback();
            Session::flash('message', 'Something went wrong!');
            Session::flash('alert-class', 'alert-danger');
        }
        return redirect()->intended('home');
    }


    public function celebrity_descripion()
    {

         $data = DB::table('pages')
                 ->select('celebrity_description','celebrity_remark','celebrity_banner')
                 ->where('id',1)
                 ->first();

        return view('celebrity_picks.celebrity_descripion',['data' => $data]);
    }


     public function celebrity_description_update(Request $request)
    {


        if($files=$request->file('celebrity_banner')){

                $image = $request->file('celebrity_banner');
                $date = date('YmdHis');
                $no = str_shuffle('123456789023456789034567890456789905678906789078908909000987654321987654321876543217654321654321543214321321211');
                $random_no = substr($no, 0, 2);
                $final_image_name = $date.$random_no.'.'.$image->getClientOriginalExtension();

                $destination_path = public_path('/images/product_categories/');
                $image->move($destination_path , $final_image_name);

        }
        else
        {

            $celebrity_banner = $request->celebrity_banners;

        }

         $data = [

            'celebrity_description' => !empty($request->celebrity_description)?$request->celebrity_description:'',
            'celebrity_remark' => !empty($request->celebrity_remark)?$request->celebrity_remark:'',
             'celebrity_banner' => !empty($final_image_name)?$final_image_name:$celebrity_banner,


        ];


          $query = DB::table('pages')
                   ->where('id',1)
                   ->update($data);

         if ($query)
        {
            DB::commit();
            Session::flash('message', 'Celebrity Descripion created successfully!');
            Session::flash('alert-class', 'alert-success');
        } else {
            DB::rollback();
            Session::flash('message', 'Something went wrong!');
            Session::flash('alert-class', 'alert-danger');
        }
        return redirect()->intended('celebrity_picks');
    }


}

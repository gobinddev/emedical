<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\ContactUs;
use Illuminate\Support\Facades\Session;
use App\CustomerAddress;
use App\Customer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use App\Order;
use App\OrderItem;
use App\Brand;
use App\DocumentLibrary;
use App\ProductCategory;
use App\UserProductAttribute;
use Request as IpRequest;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Support\Str;
use Mail;


class HomeController extends Controller
{
  
  public function registerCustomer(Request $request)
    {
       
        
         
   $input = $request->all();
   $rules = ['password' => 'required|min:8',
            'password_confirmation' => 'required|min:8|same:password',
            'email' => 'unique:customers,email'];

$messages = ['password_confirmation.same' => 'Password Confirmation should be match the Password'];
$validator = Validator::make($input, $rules, $messages);
if ($validator->fails()) {return back()->withInput()->withErrors($validator->messages());}
         
        $display_name = $request->fname."".$request->lname;
            $data = ['display_name' => $display_name,
            'first_name' => $request->fname,
            'last_name' => $request->lname,
            'email' => $request->email,
            'is_email_verified' => 1,
            'password' => bcrypt($request->password)];
        
        $insert = Customer::create($data);
        $token = Str::random(64);
    
        if($insert)
        {
            
           Session::flash('message', 'You are successfully registered Now you can login !!');
            Session::flash('alert-class', 'alert-success');
            return redirect('/logincustomer');
        }
        else{
            Session::flash('message', 'Something went wrong!!');
            Session::flash('alert-class', 'alert-danger');
            return redirect('/logincustomer');
          }
    }
    

    public function termsAndCondition()
    {
        return view('front.terms-and-condition');
    }
    
    public function privacy()
    {
        return view('front.privacy-page');
    }
    public function index()
    {   
        $ip = IpRequest::ip();
        $count =1;
        
        $data = ['ip' => $ip,
              'times' =>$count];
             
              $condition = DB::table('visitors')->where('ip', '=', $ip)->exists();
              if($condition)
              {
                  $row = DB::table('visitors')->where('ip', '=', $ip)->select('times')->get();
                 $row[0]->times;
                 $update =['ip' =>$ip,
                            'times' => $row[0]->times+1];
                DB::table('visitors')->where('ip', $ip)->update($update);
              }
              else
              {
                  DB::table('visitors')->insert($data);
              }
            
        $slider = DB::table('slider_images')->get();
        $data= DB::table('product_categories')->get();
        $categoryname = DB::table('product_categories')->select('name','description','id')->get();
        $testimonial = DB::table('testimonials')->get();
       
        $popular = DB::table('user_products')
        ->join('user_product_images', 'user_product_images.product_id', '=', 'user_products.id')
        ->where('category_id', 34)->get();
       
       $fadeup11 =DB::table('user_products')
                ->join('product_categories' ,'user_products.category_id', '=', 'product_categories.id')
                ->select('user_products.*','product_categories.id as category_id','product_categories.name','user_product_images.*')
                ->join('user_product_images', 'user_products.id', '=', 'user_product_images.product_id')
                ->get();
                
                
                
         $fadeup = DB::table('user_products')
              ->join('product_categories' ,'user_products.category_id', '=', 'product_categories.id')
             ->join('user_product_images', 'user_product_images.product_id' , '=', 'user_products.id')
                  ->join('user_product_attributes', 'user_product_attributes.product_id', '=', 'user_products.id')
                 // ->leftjoin('user_product_documentations', 'user_product_documentations.product_id', '=', 'user_products.id')
                 // ->leftjoin('product_categories', 'product_categories.id', '=', 'user_products.category_id')
                 ->get(); 
        
                
       //dd($fadeup);
        $product= DB::table('user_products')
        ->join('user_product_images', 'user_products.id', '=', 'user_product_images.product_id')
        ->join('user_product_attribute_values', 'user_products.id', '=', 'user_product_attribute_values.product_id')
        ->select('user_product_images.*','user_products.*','user_product_attribute_values.*')->where('category_id', 27)->paginate(8);
        // dd($categoryname,$product);
        return view('front.index',compact('data','product','testimonial','slider','popular','fadeup'))->with('categoryname', $categoryname);
    }

    public function getproductbyid($id)
    {    
         $slider = DB::table('slider_images')->get();
         $data= DB::table('product_categories')->get();
         $categoryname = DB::table('product_categories')->where('id', $id)->select('name','description','id')->get();
         $testimonial = DB::table('testimonials')->get();
         $popular = DB::table('user_products')
        ->join('user_product_images', 'user_product_images.product_id', '=', 'user_products.id')
        ->where('is_popular', 1)
        ->where('user_products.category_id', $id)->get();
        
         $product= DB::table('user_products')
        ->join('user_product_images', 'user_products.id', '=', 'user_product_images.product_id')
        ->join('user_product_attribute_values', 'user_products.id', '=', 'user_product_attribute_values.product_id')
        ->where('user_products.category_id', $id)
        ->select('user_product_images.*','user_products.*','user_product_attribute_values.*')->get();
        
         return view('front.index',compact('data','product','testimonial','slider','popular'))->with('categoryname', $categoryname);
    }
    
    public function getSubscribe(Request $request)
    {
       echo $email = $request->get('email');
       die;
       if($email)
       {
           $data = ['email' => $email,
                     'status'=>'subscribe'];
           $insert = DB::table('students')->insert($data);
           return true;
       }
       return false;
    }
   
   public function saveconatactus(Request $request)
   {
      echo $name = $request->name;
       echo $email = $request->email;
       $message  = $request->message;
       $subject  = $request->subject;
       $phone  = $request->phone;
       die;
       $datainsert = ['name' => $name,
                       'email' => $email,
                       'mobile' => $phone,
                       'subject' => $subject,
                       'message' => $message];
        $insert = DB::table('contact_us')->insert($datainsert);
       if($insert)
       {
           return response()->json(['success'=>'successs']);
       }
       return response()->json(['error'=>'invalid']);
       
   }
   
    public function viewCart()
    {
        return view('front.cart');
    }
    
    public function checkout()
    {
        return view('front.checkout');
    }
    
    public function aboutUs()
    {
        return view('front.terms-and-condition');
    }
    public function contactUss()
    {
        return view('front.contact-us');
    }
    
    public function indexLogin()
    {
       return view('front.login');
    }
        public function indexSignin()
    {
       return view('front.register');
    }

     public function contact()
     {
        return view('front.contact'); 
     }
     
     public function forgotpassword()
     {
        return view('front.forgotpassword'); 
     }
     
     public function passwordrest(Request $request)
     {
        $email = $request->email;
        $password = $request->password;
        $cpassword = $request->cpassword;
        
          $input = $request->all();
   $rules = ['password' => 'required|min:8',
            'cpassword' => 'required|min:8|same:password',
            'email' => 'required'];

$messages = ['cpassword.same' => 'confirm password not matched the Password',
             'cpassword' => 'confirm password atleast 8 charecters'];
$validator = Validator::make($input, $rules, $messages);
if ($validator->fails()) {return back()->withInput()->withErrors($validator->messages());}
        
        $exist = DB::table('customers')->where('email', $email)->exists();
        if($exist)
        {
           $updatepassword = DB::table('customers')->where('email', $email)->update(['password' => bcrypt($password)]);
            if($updatepassword)
            {
           Session::flash('message', 'Your Password Has been Reset Please do Login !');
           return redirect('logincustomer');
            }
            Session::flash('message', 'Ooh Some technical issue !');
           return redirect()->back();
        }
            Session::flash('message', 'Your email id does not exists !');
            return redirect()->back();
    }

    public function contactUs(Request $request)
    {
        if($request->isMethod('get'))
        {
            return view('front.contactus');
        }

        $request->validate([
            'name' => 'required|regex:/^[a-zA-Z ]+$/u|min:1|max:255',
            'email' => 'required|email:rfc,dns',
            'mobile' => 'required|regex:/^(?=.*[0-9])[0-9]{10}$/',
            'subject' => 'required',
            'message' => 'required'

        ]
        );

        DB::beginTransaction();

        $data=[
            'name' => $request->name,
            'email' => $request->email,
            'mobile' => $request->mobile,
            'subject' => $request->subject,
            'message' => $request->message
        ];

        $query = ContactUs::create($data);

        if ($query) {
            DB::commit();
            Session::flash('message', 'Contact Form Submitted Successfully!!');
            Session::flash('alert-class', 'alert-success');
        }
        else
        {
            DB::rollback();
            Session::flash('message', 'Something went wrong!');
            Session::flash('alert-class', 'alert-danger');
        }

        return redirect()->intended('contactus');

    }

    public function myaccount()
    {
        $user_id = Session::get('user_id');
        if($user_id=='')
        {
            return redirect('logincustomer');
        }

        $orders = Order::where(['user_id'=>$user_id])->where('status','<>','0')->get(); 
        $customer_addresses = CustomerAddress::where('customer_id',$user_id)->get();
        $countries = DB::table('countries')->get();
        $states = DB::table('states')->where('country_id','101')->get();
       return view('front.myaccount',compact('customer_addresses','countries','states','orders'));
    }

    public function accountUpdate(Request $request)
    {
        $user_id = Auth::guard('customer')->user()->id;
        $rules = [
            'first_name' => 'required|regex:/^[a-zA-Z ]+$/u|min:1|max:255',
            'last_name' => 'nullable|regex:/^[a-zA-Z ]+$/u|min:1|max:255',
        ];

        $validator = Validator::make($request->all(),$rules);

        if($validator->fails())
        {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ]);
        }

        $data = [
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'display_name' => $request->input('first_name').' '.$request->input('last_name'),
        ];

        DB::beginTransaction();

        $query=Customer::find($user_id)->update($data);

        if ($query) {
            DB::commit();
            Session::flash('message', 'Account Details Updated Successfully!!');
            Session::flash('alert-class', 'alert-success');
        }
        else
        {
            DB::rollback();
            Session::flash('message', 'Something went wrong!');
            Session::flash('alert-class', 'alert-danger');
        }

        return response()->json([
            'success' => true
        ]);
    }

    public function billingAddressCreate(Request $request)
    {
        $user_id = Auth::guard('customer')->user()->id;

        $rules = [
            'name' => 'required|regex:/^[a-zA-Z ]+$/u|min:1|max:255',
            'email' => 'required|email:rfc,dns',
            'mobile' => 'required|regex:/^\\d{10}$/',
            'address_line_1' => 'required',
            'address_line_2' => 'nullable',
            'country' => 'required',
            'state' => 'required',
            'city' => 'required',
            'pincode' => 'required|numeric|digits:6',
            'location' => 'required'
        ];

        $custom = [
            'name.regex' => 'The name field must be string',
            'mobile.regex' => 'Mobile Number Must Be 10-digit Number'
        ];

        $validator = Validator::make($request->all(),$rules,$custom);

        if($validator->fails())
        {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ]);
        }

        if(($request->input('geo_lat')==NULL || $request->input('geo_lat')=='' || !is_numeric($request->input('geo_lat'))) || ($request->input('geo_long')==NULL || $request->input('geo_long')=='' || !is_numeric($request->input('geo_long'))))
        {
            return response()->json([
                'success' => false,
                'errors' => ['all' => 'Search & Select the Place !!']
            ]);
        }

        DB::beginTransaction();

        $phone = preg_replace('/\D/','',$request->mobile);

        $cust_address = CustomerAddress::where('customer_id',$user_id)->get();

        if(count($cust_address) > 0)
        {
            CustomerAddress::where('customer_id',$user_id)->update(['is_default'=>0]);
        }

        $data = [
            'customer_id' => $user_id,
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'phone' => $phone,
            'country_id' => $request->input('country'),
            'state_id' => $request->input('state'),
            'city_id' => $request->input('city'),
            'pincode' => $request->input('pincode'),
            'address_line_1' => $request->input('address_line_1'),
            'address_line_2' => $request->input('address_line_2'),
            'latitude' => $request->input('geo_lat'),
            'longitude' => $request->input('geo_long'),
            'geo_address' => $request->input('geo_addr'),
            'geo_city' => $request->input('geo_city'),
            'landmark'  => $request->input('landmark'),
            'is_default' => 1,
            'created_at' => date('Y-m-d H:i:s')
        ];

        $query = CustomerAddress::create($data);

        if ($query) {
            DB::commit();
            Session::flash('message', 'Billing Address Added Successfully!');
            Session::flash('alert-class', 'alert-success');
        }
        else
        {
            DB::rollback();
            Session::flash('message', 'Something went wrong!');
            Session::flash('alert-class', 'alert-danger');
        }

        return response()->json([
            'success' => true
        ]);
    }

    public function billingAddressEdit(Request $request)
    {
        $user_id = Auth::guard('customer')->user()->id;

        $id = Crypt::decryptString($request->id);

        if($request->isMethod('get'))
        {
            $cust_address = CustomerAddress::where('id',$id)->first();
            $countries = DB::table('countries')->get();
            $states = DB::table('states')->where('country_id',$cust_address->country_id)->get();
            $cities = DB::table('cities')->where('state_id',$cust_address->state_id)->get();
            return response()->json([
                'result' => $cust_address,
                'country' => $countries,
                'state' => $states,
                'city' => $cities
            ]);
        }

        $rules = [
            'name' => 'required|regex:/^[a-zA-Z ]+$/u|min:1|max:255',
            'email' => 'required|email:rfc,dns',
            'mobile' => 'required|regex:/^\\d{10}$/',
            'address_line_1' => 'required',
            'address_line_2' => 'nullable',
            'country' => 'required',
            'state' => 'required',
            'city' => 'required',
            'pincode' => 'required|numeric|digits:6',
            'location' => 'required',
        ];

        $custom = [
            'name.regex' => 'The name field must be string',
            'mobile.regex' => 'Mobile Number Must Be 10-digit Number'
        ];

        $validator = Validator::make($request->all(),$rules,$custom);

        if($validator->fails())
        {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ]);
        }

        if(($request->input('geo_lat')==NULL || $request->input('geo_lat')=='' || !is_numeric($request->input('geo_lat'))) || ($request->input('geo_long')==NULL || $request->input('geo_long')=='' || !is_numeric($request->input('geo_long'))))
        {
            return response()->json([
                'success' => false,
                'errors' => ['all' => 'Search & Select the Place !!']
            ]);
        }

        DB::beginTransaction();

        $phone = preg_replace('/\D/','',$request->mobile);

        $data = [
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'phone' => $phone,
            'country_id' => $request->input('country'),
            'state_id' => $request->input('state'),
            'city_id' => $request->input('city'),
            'pincode' => $request->input('pincode'),
            'address_line_1' => $request->input('address_line_1'),
            'address_line_2' => $request->input('address_line_2'),
            'latitude' => $request->input('geo_lat'),
            'longitude' => $request->input('geo_long'),
            'geo_address' => $request->input('geo_addr'),
            'geo_city' => $request->input('geo_city'),
            'landmark'  => $request->input('landmark'),
            'updated_at' => date('Y-m-d H:i:s')
        ];

        $query = CustomerAddress::find($id)->update($data);

        if ($query) {
            DB::commit();
            Session::flash('message', 'Billing Address Updated Successfully!!');
            Session::flash('alert-class', 'alert-success');
        }
        else
        {
            DB::rollback();
            Session::flash('message', 'Something went wrong!');
            Session::flash('alert-class', 'alert-danger');
        }

        return response()->json([
            'success' => true,
        ]);
    }

    /**
     * Change password
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function changePassword(Request $request)
    {
        $user_id = Auth::guard('customer')->user()->id;

        $rules = [
            'current_password' => 'required',
            'new_password' => 'required_with:confirm_password|same:confirm_password|min:10',
            'confirm_password' => 'min:10'

            ];
        $validator = Validator::make($request->all(), $rules);

               if ($validator->fails()){
                   return response()->json([
                       'success' => false,
                       'errors' => $validator->errors()
                   ]);
               }


        DB::beginTransaction();
        try
        {
                $raw_pass =$request->input('new_password');


                if (!preg_match("/^(?=.{10,20})(?=.[a-z])(?=.[A-Z])(?=.[0-9])(?=.[$@%£!]).*$/", $raw_pass)){

                        return response()->json([
                            'success' => false,
                            'custom'=>'yes',
                            'errors' => ['new_password'=>'Password must be atleast 10 characters long including (Atleast 1 uppercase letter(A–Z), Lowercase letter(a–z), 1 number(0–9), 1 non-alphanumeric symbol(‘$%£!’) !']
                        ]);
                }
                // hash password
                $password = bcrypt($request->input('new_password'));


                $login = Customer::where('id',$user_id)->first();

                $pStatus = Hash::check($request->get('current_password'),$login->password);

                // check password
                if($pStatus === false)
                {
                    return response()->json([
                        'success' => false,
                        'custom'=>'yes',
                        'errors' => ['current_password'=>'Please enter your correct current password']
                    ]);
                }
                if($pStatus === true)
                {
                    Customer::find($user_id)
                    ->update(['password'=>$password]);

                    Auth::guard('customer')->logout();

                    DB::commit();
                    return response()->json([
                        'success' =>true,
                    ]);

                }
        }
        catch (\Exception $e) {
            DB::rollback();
            // something went wrong
            return $e;
        }



    }

    public function brandList(Request $request)
    {
        $brands = Brand::where('status',1)->get();

        return view('front.brandlist',compact('brands'));
    }

    public function videoCenter(Request $request)
    {
        $productCategories = ProductCategory::where('parent_id',0)->where('status','<>',9)->get();
        $libraries = DocumentLibrary::where('status',1)->where('document_type',1);
                    if($request->get('category_id')!="")
                    {
                        $libraries->where('category_id',Crypt::decryptString($request->get('category_id')));
                    }
                   $libraries = $libraries->paginate(6);
        return view('front.video-center',compact('productCategories','libraries'));
    }

    public function brandPromotion(Request $request)
    {
        $id = Crypt::decryptString($request->id);

        $brand = Brand::where('id',$id)->first();
        $all_products = UserProductAttribute::from('user_product_attributes as ua')
                        ->distinct('ua.product_id')
                        ->select('ua.*',DB::raw("MIN(ua.discounted_price) as dis_price"),'u.product_title','u.short_description','u.description','u.specification','u.in_box','u.is_popular','u.is_return','u.is_featured','u.status')
                        ->join('user_products as u','ua.product_id','=','u.id')
                        ->where('u.status','1')
                        ->whereNotNull('u.vendor_id')
                        ->where('u.brand_id',$id);

        $all_products=$all_products->groupBy('ua.product_id')->orderBy('u.created_at','desc')->paginate(12);

        return view('front.brand-promotion',compact('all_products','brand'));
    }

    public function visitStore(Request $request)
    {
        $id = Crypt::decryptString($request->id);

        $vendor = Vendor::where('id',$id)->first();

        $all_products = UserProductAttribute::from('user_product_attributes as ua')
                        ->distinct('ua.product_id')
                        ->select('ua.*',DB::raw("MIN(ua.discounted_price) as dis_price"),'u.product_title','u.short_description','u.description','u.specification','u.in_box','u.is_popular','u.is_return','u.is_featured','u.status')
                        ->join('user_products as u','ua.product_id','=','u.id')
                        ->where('u.status','1')
                        ->whereNotNull('u.vendor_id')
                        ->where('u.vendor_id',$id);

        $all_products=$all_products->groupBy('ua.product_id')->orderBy('u.created_at','desc')->paginate(12);

        return view('front.visit-store',compact('all_products','vendor'));

    }

}

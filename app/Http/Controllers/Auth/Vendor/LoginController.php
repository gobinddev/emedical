<?php

namespace App\Http\Controllers\Auth\Vendor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use App\Vendor;
class LoginController extends Controller
{
    //
     /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */

    // protected $redirectTo = RouteServiceProvider::HOME;

    //protected $redirectTo = '/admin/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('guest:customer')->except('logout');
    }

    public function login(Request $request){

        $request->validate([
            'email' => 'required|email:rfc,dns|exists:vendors,email',
            'password' => 'required'
        ],
        [
            'email.exists' => 'This Email is Not Registered in Our System'
        ]
        );

        $is_deleted = Vendor::where(['email'=>$request->email,'status'=>'9'])->first();

        if($is_deleted!=NULL)
        {
            Session::flash('message', 'Your Account Has Been Deleted, Please Contact to System Administrator !!');
            Session::flash('alert-class', 'alert-danger');

            return redirect()->back();
        }

        $deactive = Vendor::where(['email'=>$request->email,'status'=>'0'])->first();

        if($deactive!=NULL)
        {
            Session::flash('message', 'Your Account Has Been Deactivated, Please Contact to System Administrator !!');
            Session::flash('alert-class', 'alert-danger');

            return redirect()->back();
        }

        $check = $request->only('email','password');

        if(Auth::guard('vendor')->attempt($check))
        {
            return redirect('/vendor/home');
        }
        else
        {
            Session::flash('message', 'Login Failed!');
            Session::flash('alert-class', 'alert-danger');

            return redirect()->back();
        }


    }

    public function register(Request $request)
    {
        $request->validate([
            'business_name' => 'required',
            'address_line_1' => 'required',
            'address_line_2' => 'nullable',
            'country' => 'required',
            'state' => 'required',
            'city' => 'required',
            'pincode' => 'required|numeric|digits:6',
            'first_name' => 'required|regex:/^[a-zA-Z ]+$/u|min:1|max:255',
            'last_name' => 'nullable|regex:/^[a-zA-Z]+$/u|min:1|max:255',
            'phone_number' => 'required|regex:/^\\d{10}$/',
            'email_id' => 'required|email:rfc,dns|unique:vendors,email',
            'pass' => 'required',
            'location' => 'required'
        ],
        [
            'first_name.regex' => 'First Name Must Be Allowed Character & Spaces',
            'last_name.regex' => 'First Name Must Be Allowed Character',
            'email_id.unique' => 'Email ID Has Already Been Taken !!',
            'phone_number.regex'=>'Phone Number Must Be 10-digit Number',
            'pass.required' => 'The password field is required'
        ]
        );

        $phone = preg_replace('/\D/','',$request->phone_number);

        if(strlen($phone)!=10)
        {
            return back()->withInput()->withErrors(['phone_number'=>'Phone Number Must Be 10-digit Number']);
        }


        if(($request->input('geo_lat')==NULL || $request->input('geo_lat')=='' || !is_numeric($request->input('geo_lat'))) || ($request->input('geo_long')==NULL || $request->input('geo_long')=='' || !is_numeric($request->input('geo_long'))))
        {

            return back()->withInput()->withErrors(['location' => 'Search & Select the Place !!']);
        }

        DB::beginTransaction();

        $data = [
            'business_name' => $request->input('business_name'),
            'address_line_1' => $request->input('address_line_1'),
            'address_line_2' => $request->input('address_line_2'),
            'country_id' => $request->input('country'),
            'state_id' => $request->input('state'),
            'city_id' => $request->input('city'),
            'pincode' => $request->input('pincode'),
            'latitude' => $request->input('geo_lat'),
            'longitude' => $request->input('geo_long'),
            'geo_address' => $request->input('geo_addr'),
            'geo_city' => $request->input('geo_city'),
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'name' => $request->input('first_name').' '.$request->input('last_name'),
            'phone' => $phone,
            'email' => $request->input('email_id'),
            'password' => bcrypt($request->input('pass')),
            'status' => 0,
            'created_at' => date('Y-m-d H:i:s')
        ];

        $query = Vendor::create($data);

        if ($query) {

            DB::commit();
            Session::flash('message', 'Account Created Successfully !!');
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

    public function logout(Request $request)
    {
        Auth::guard('vendor')->logout();

        return redirect('/vendor/login');
    }
}

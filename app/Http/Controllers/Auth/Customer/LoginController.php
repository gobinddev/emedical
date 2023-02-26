<?php

namespace App\Http\Controllers\Auth\Customer;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Customer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
class LoginController extends Controller
{
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
        $this->middleware('guest:customer')->except('logout');
    }

    // public function showLoginForm()
    // {
    //     return view('auth.login');
    // }

    public function login(Request $request){

        $request->validate([
            'email' => 'required|email:rfc,dns|exists:customers,email',
            'password' => 'required'
        ],
        [
            'email.exists' => 'This Email is Not Registered in Our System'
        ]
        );

        $is_deleted = Customer::where(['email'=>$request->email,'status'=>'9'])->first();

        if($is_deleted!=NULL)
        {
            Session::flash('message', 'Your Account Has Been Deleted, Please Contact to System Administrator !!');
            Session::flash('alert-class', 'alert-danger');

            return redirect()->back();
        }

        $deactive = Customer::where(['email'=>$request->email,'status'=>'0'])->first();

        if($deactive!=NULL)
        {
            Session::flash('message', 'Your Account Has Been Deactivated, Please Contact to System Administrator !!');
            Session::flash('alert-class', 'alert-danger');

            return redirect()->back();
        }

        $email_verified = Customer::where(['email'=>$request->email,'is_email_verified'=>'1'])->first();

        if($email_verified==NULL)
        {
            Session::flash('message', 'Email Account is Not Verified Yet !!');
            Session::flash('alert-class', 'alert-danger');

            return redirect()->back();
        }

        $check = ['email' =>$request->email, 'password' => bcrypt($request->password)];
      
        $row = DB::table('customers')->where('email',$request->email)->get();
       
      
        if(Hash::check($request->password , $row[0]->password))
        {
            Session::put('user_name', $row[0]->display_name);
            Session::put('user_id', $row[0]->id);
        
            return redirect('/');
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
            'first_name' => 'required|regex:/^[a-zA-Z ]+$/u|min:1|max:255',
            'last_name' => 'nullable|regex:/^[a-zA-Z]+$/u|min:1|max:255',
            'phone_number' => 'required|regex:/^\\d{10}$/',
            'email_id' => 'required|email:rfc,dns|unique:customers,email',
            'pass' => 'required'
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

        $token = Str::random(50);

        DB::beginTransaction();

        $data = [
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'display_name' => $request->input('first_name').' '.$request->input('last_name'),
            'phone' => $phone,
            'email' => $request->input('email_id'),
            'password' => bcrypt($request->input('pass')),
            'is_email_verified' => 0,
            'email_verification_token' => $token,
            'created_at' => date('Y-m-d H:i:s')
        ];

        $query = Customer::create($data);

        if ($query) {

            $name = $request->input('first_name').''.$request->input('last_name');

            $email = $request->input('email_id');

            $data=['name' =>$name,'email' => $email,'token' => $token];

            Mail::send(['html'=>'mails.email-verify'], $data, function($message) use($email,$name) {
                $message->to($email, $name)->subject
                    ('Toovem - Account Verification');
                $message->from(env('MAIL_USERNAME'),env('MAIL_FROM_NAME'));
            });

            DB::commit();
            Session::flash('message', 'Account Created Successfully, Check Your Mail To Verify Your Account !!');
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
        Auth::guard('customer')->logout();
        Session::forget('user_name');
        Session::flush();
        return redirect('/');
    }

    
}

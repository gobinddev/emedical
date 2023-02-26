<?php

namespace App\Http\Controllers\Auth\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// use App\Providers\RouteServiceProvider;
// use Illuminate\Foundation\Auth\ResetsPasswords;
// use Illuminate\Support\Facades\Password;
use App\Customer;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
class ResetPasswordController extends Controller
{
    //
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    // use ResetsPasswords;

    // /**
    //  * Where to redirect users after resetting their password.
    //  *
    //  * @var string
    //  */
    // protected $redirectTo = route('customer.myaccount');

    public function __construct()
    {
        $this->middleware('guest:customer');
    }

    protected function guard()
    {
        return Auth::guard('customer');
    }

    public function showResetForm(Request $request)
    {
        $token = $request->token;

        $customer = Customer::where(['email_verification_token'=>$token,'status'=>1])->first();

        if($customer)
        {
            $nextday =Carbon::parse($customer->email_verification_sent_at)->addHours(2);
                        
            $now = Carbon::now(); 

            $expiry_date= $nextday->diffInHours($now, false);
            if($expiry_date < 0)
                return view('auth.passwords.reset',compact('token'));
            else
            {
                Session::flash('message', 'Password Reset Link Has Been Expired, Please Try Again !!');
                Session::flash('alert-class', 'alert-danger');

                return redirect()->route('customer.login');
            }
        }
        else
        {
            return redirect()->route('customer.login');
        }
    }

    public function reset(Request $request)
    {
        $token = $request->token;
        $request->validate([
            'password' => 'required|same:password_confirmation|min:5',
            'password_confirmation' => 'nullable|same:password|min:5'
             
        ]
        );

        $pwd = $request->input('password');
        if (!preg_match("/^(?=.{10,20})(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[$@%£!]).*$/", $pwd)){
            
            return back()->withInput()->withErrors(['password'=>'Password must be atleast 10 characters long including (Atleast 1 uppercase letter(A–Z), Lowercase letter(a–z), 1 number(0–9), 1 non-alphanumeric symbol(‘$@%£!’) !']); 
        }

        $customer=Customer::where(['email_verification_token'=>$token])->first();

        if(Auth::guard('customer')->check())
        {
            Auth::guard('customer')->logout();
        }

        Customer::find($customer->id)->update(['password'=> Hash::make($request->input('password')),'email_verification_token'=>NULL]);

        Auth::guard('customer')->loginUsingId($customer->id);

        return redirect()->route('customer.myaccount');
    }

    // protected function broker()
    // {
    //     return Password::broker('customers');
    // }


}

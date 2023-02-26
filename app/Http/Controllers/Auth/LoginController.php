<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
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

    protected $redirectTo = '/admin/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    // public function showLoginForm()
    // {
    //     return view('auth.admin.login');
    // }

    public function login(Request $request){

        $request->validate([
            'email' => 'required|email:rfc,dns|exists:users,email',
            'password' => 'required'
        ],
        [
            'email.exists' => 'This Email is Not Registered in Our System'
        ]
        );

        $is_deleted = User::where(['email'=>$request->email,'status'=>'9'])->first();

        if($is_deleted!=NULL)
        {
            Session::flash('message', 'Your Account Has Been Deleted, Please Contact to System Administrator !!');
            Session::flash('alert-class', 'alert-danger');

            return redirect()->back();
        }

        $deactive = User::where(['email'=>$request->email,'status'=>'0'])->first();

        if($deactive!=NULL)
        {
            Session::flash('message', 'Your Account Has Been Deactivated, Please Contact to System Administrator !!');
            Session::flash('alert-class', 'alert-danger');

            return redirect()->back();
        }

        $check = $request->only('email','password');

        if(Auth::guard('web')->attempt($check))
        {
            return redirect('/admin/home');
        }
        else
        {
            Session::flash('message', 'Login Failed!');
            Session::flash('alert-class', 'alert-danger');

            return redirect()->back();
        }


    }

    public function logout(Request $request)
    {
        $this->guard('web')->logout();

        // $request->session()->invalidate();

        return $this->loggedOut($request) ?: redirect('/admin/login');
    }

    
}

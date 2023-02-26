<?php

namespace App\Http\Controllers\Auth\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Customer;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
// use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
// use Illuminate\Support\Facades\Password;
class ForgotPasswordController extends Controller
{
    //
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    // use SendsPasswordResetEmails;

    public function __construct()
    {
        $this->middleware('guest:customer');
    }

    public function showLinkRequestForm()
    {
        return view('auth.passwords.email');
    }

    public function sendResetLinkEmail(Request $request)
    {
        $request->validate([
            'email'  =>'required|email:rfc,dns|exists:customers,email',
             
        ],
        [
            'email.exists' => 'This Email is Not Registered in Our System'
        ]
        );
         
        //   $customMessages = [
        //     'email.required' => 'Please fill email to forget password.',
           
        //  ];

        $token=Str::random(50);

         $email = $request->email;
         $is_deleted = Customer::where(['email'=>$email,'status'=>9])->first();
         if($is_deleted)
         {
            Session::flash('message', 'Your Account Has Been Deleted, Please Contact to System Administrator !!');
            Session::flash('alert-class', 'alert-danger');
            return redirect()->back();
         }

        //  dd($email);
        $user = Customer::where(['email'=>$email,'status'=>1])->first();
       
        if ($user) {
            
            $email = $user->email;
                $name  = $user->name;
                $id    = base64_encode($user->id);
                $url = route('customer.password.reset',['token'=>$token]);
                
                $data  = array('name'=>$name,'email'=>$email,'id'=>$id,'url'=>$url);

                Customer::where('email',$email)->update(
                    [
                        'email_verification_token' => $token,
                        'email_verification_sent_at' => date('Y-m-d H:i:s')
                    ]);

                Mail::send(['html'=>'mails.forget-password'], $data, function($message) use($email,$name) {
                    $message->to($email, $name)->subject
                    ('Toovem - Reset Password Link');
                        $message->from(env('MAIL_USERNAME'),env('MAIL_FROM_NAME'));
                    });

            Session::flash('message', 'Link Has Been on your email address, Check your inbox to reset password !!');
            Session::flash('alert-class', 'alert-success');
            return redirect()->back();
        } else {
            Session::flash('message', 'Your Account Has Been Deactivated, Please Contact to System Administrator !!');
            Session::flash('alert-class', 'alert-danger');
            return redirect()->back();
        }
    }

    // protected function broker()
    // {
    //     return Password::broker('customers');
    // }
}

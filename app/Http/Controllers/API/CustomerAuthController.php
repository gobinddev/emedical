<?php

namespace App\Http\Controllers\API;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use DB;
use Hash;
use Mail;
use App\User;
use Auth;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;  

class CustomerAuthController extends Controller
{

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|min:3|max:50',
            'email' => 'required|string|max:255|email|unique:users',
            'password' => 'required|string|min:6',
            'phone_number' => 'required|string|min:10',
            'confirm_password' => 'required|string|same:password',
        ]);
        if ($validator->fails()) {
            return response()->json(['response' => false, 'message'=>'validation error', 'error'=>$validator->errors()], 200);
        }
        $temp_array = [
                'role_id' => 4,
                'name' => $request->name,
                'email' => $request->email,
                'phone_number' => $request->phone_number,
                'password' => bcrypt($request->password),
                'status' => 1,
            ];
        $user = User::create($temp_array);
        if ($user) {
            $token = JWTAuth::fromUser($user);
            return response()->json(['response' => true, 'message'=>'Your account has been created successfully. Please login with your email id & password.', 'token'=>$token], 200);
        } else {
            return response()->json(['response' => false, 'message'=>'failure'], 200);   
        }
    }


    public function update_password(Request $request)
    {

         $validator = Validator::make($request->all(), [
            
            'user_id'  => 'required',
            'old_password'  => 'required',
            'password' => 'required|string|min:8',
           
        ]);
        if ($validator->fails()) {
            return response()->json(['response' => false, 'message'=>'validation error', 'error'=>$validator->errors()], 200);
        }


        $user_id = $request->get('user_id');

        $login = DB::table('users')
                 ->where(['id'=>$user_id])
                 ->first();    
       
        $t = Hash::check($request->get('old_password'),$login->password);
       
        if($t==true)
        {


                    DB::table('users')
                    ->where('id',$user_id)
                    ->update(['password' => bcrypt($request->password),]);


           
            return response()->json(['response' => true, 'message'=>'Password has been changed successfully.'], 200);
        

        }
         else {
            return response()->json(['response' => false, 'message'=>'Old password is invalid'], 200);   
        }


        

    }

     public function updateProfile(Request $request)
    {

        
       $user_id = $request->user_id;
       $name = $request->name;
       $phone_number = $request->phone_number;

       if($request->image!='')
       {

        $image = base64_decode($request->image);
        $image_name ="";
        $image_string   = $request->input('image');

        //$filename = $filename;
        $new_filename = time().'-ms-'.'.jpeg';
        // Decode Image
        $binary=base64_decode($image_string);
        header('Content-Type: bitmap; charset=utf-8');
        // Images will be saved under 'www/uploads/users' folder
        $file = fopen(public_path() . "/images/profile/".$new_filename, 'wb');
        // Create File
        fwrite($file, $binary);
        $image_name = $new_filename;
    }
    else
    {
        
           
         $login = DB::table('users')
                  ->select('image')
                  ->where(['id'=>$user_id])
                  ->first(); 

         if($login)
         {
            $image_name = $login->image;

         }
         else
         {

             $image_name = "";

         }

        


    }
    

        // var_dump($image_name); die;
        // print $success ? $png_url : 'Unable to save the file.';

       $data = [
                
                'name'          => $request->name,
                'phone_number'  => $request->phone_number,
                'image'         =>$image_name,
                'status'        => 1,
                'updated_at'    =>date('Y-m-d H:i:s'),
            ];


           // print_r($data);die;
        

       $query =  DB::table('users')
                 ->where('id',$user_id)
                 ->update($data);

      if($image_name!='')
       {
        
        $data['image'] = asset('/images/profile/' . $image_name);
       }

     else
     {
        $data['image'] ='';
     }

       if ($query) 
       {
           return response()->json(['response' => true, 'message'=>'Profile updated successfully','data'=>$data], 200);   
       } 
       else 
       {
            return response()->json(['response' => false, 'message'=>'failure'], 200);   
       }
    


    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|string|max:255|email',
            'password' => 'required|string|min:8',
        ]);
        if ($validator->fails()) {
            return response()->json(['response' => false, 'message'=>'validation error', 'error'=>$validator->errors()], 200);
        }
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){


            $user = Auth::user();
            $token = JWTAuth::fromUser($user);
            $data['id'] = $user->id;
            $data['role_id'] = $user->role_id;
            $data['name'] = $user->name;
            $data['phone_number'] = $user->phone_number;
            if($user->image!='')
            {
                $data['image'] = asset('/images/profile/' . $user->image);

            }
            else
            {
                $data['image'] = '';

            }
            
            $data['email'] = $user->email;
            $data['created_at'] = date('Y-m-d H:i:s', strtotime($user->created_at));
            return response()->json(['response' => true, 'message'=>'You have logged in successfully.', 'token'=>$token, 'data'=>$data], 200);
        }
        else{
            return response()->json(['response' => false, 'message'=>'failure'], 200);   
        }
    }


  public function socialLogin_Check(Request $request)
  {

        $validator = Validator::make($request->all(), [
            'social_id' => 'required',
            
        ]);
        if ($validator->fails()) {
            return response()->json(['response' => false, 'message'=>'validation error', 'error'=>$validator->errors()], 200);
        }

        $social_id = $request->social_id;


        $user =  DB::table('users')
                 ->where('social_id',$social_id)
                 ->first();


        if($user)
        {

            $data['id'] = $user->id;
            $data['name'] = $user->name;
            $data['phone_number'] = $user->phone_number;
            if($user->image!='')
            {
                $data['image'] = asset('/images/profile/' . $user->image);

            }
            else
            {
                $data['image'] = '';

            }
            
            $data['email'] = $user->email;
           
            return response()->json(['response' => true, 'message'=>'You have logged in successfully.','data'=>$data], 200);


        }
        else
        {

            return response()->json(['response' => false, 'message'=>'failure'], 200);   

        }

  }

  public function socialLogin(Request $request)
    {
        $validator = Validator::make($request->all(), [

            'social_id'    => 'required',
            'name'         => 'required|string|min:3|max:50',
            'email'        => 'required|string|max:255|email|unique:users',
            'phone_number' => 'required|string|min:10',
        ]);
        if ($validator->fails()) {
            return response()->json(['response' => false, 'message'=>'validation error', 'error'=>$validator->errors()], 200);
        }
        $temp_array = [
                'role_id'      => 4,
                'social_id'    => $request->social_id,
                'name'         => $request->name,
                'email'        => $request->email,
                'phone_number' => $request->phone_number,
                'status'       => 1,
            ];
        $user = User::create($temp_array);

       
         $data = [
                'role_id'      => 4,
                'user_id'      => $user->id,
                'social_id'    => $user->social_id,
                'name'         => $user->name,
                'email'        => $user->email,
                'phone_number' => $user->phone_number,
                'status'       => 1,
            ];




        if ($user) {
            $token = JWTAuth::fromUser($user);
            return response()->json(['response' => true, 'message'=>'Your account has been created successfully.', 'token'=>$token,'data'=>$data], 200);
        } else {
            return response()->json(['response' => false, 'message'=>'failure'], 200);   
        }

   }


 public function forgetPassword(Request $request)
 {

      $validator = Validator::make($request->all(), [
           'email' => 'required|string|max:255|email',
            
        ]);
        
      if ($validator->fails()) {
            return response()->json(['response' => false, 'message'=>'validation error', 'error'=>$validator->errors()], 200);
        }

      $email = $request->email;
      $usersDetail = DB::table('users')->where(['email'=>$request->email])->first();
      $username = preg_replace('/\s+/', '', $usersDetail->name);

      $password = "Hello".$username;
    //   $password = bin2hex(openssl_random_pseudo_bytes(4));


      $data = [
 
                  'password'=>$password,
        ];

     
      $query =  DB::table('users')
                ->where('email',$email)
                ->update(['password'=>bcrypt($password)]);

  if($query)
  {

     Mail::send(['html'=>'auth.passwordMail'], $data, function($message) use($email) {
                     $message->to($email)->subject
                        ('khannajeweller');
                     $message->from('customercare@khannajeweller.com',"khanna-jeweller Live");
                  });
            
      return response()->json(['response' => true, 'message'=>'Your new password has been sent. Please check your registered email id.'], 200);
  }
  else
  {

      return response()->json(['response' => false, 'message'=>'failure'], 200);   

  }

 
 }


 public function socialHide()
 {

   return response()->json(['status' => true, 'message'=>'status for IOS'], 200);   
 }


 }

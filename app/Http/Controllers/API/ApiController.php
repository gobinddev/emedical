<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use DB;
use Carbon\Carbon;
use App\ProductCategory;
use App\Product;
use App\ProductImage;
use App\CelebrityPick;
use Mail;
use App\SliderImage;
use App\Appointment;
use Auth;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;

class ApiController extends Controller
{
    public function getProductCategories()
    {
        $product_categories = ProductCategory::where('product_categories.status', '=', 1)->orderby('id','DESC')->get();
        $final_out = array();
        if ($product_categories) {
            foreach ($product_categories as $key => $value) {
                $out['id'] = !empty($value->id)?$value->id:'';           
                $out['name'] = !empty($value->name)?$value->name:'';           
                $out['description'] = !empty($value->description)?$value->description:'';           
                $out['remarks'] = !empty($value->remarks)?$value->remarks:'';           
                $out['image'] = !empty($value->image)?asset('/images/product_categories/' . $value->image):'';
                $final_out[] = $out; 
            }
            return response()->json(['response' => true, 'message'=>'success', 'data'=>$final_out], 200);   
        } else {
            return response()->json(['response' => false, 'message'=>'failure', 'data'=>$final_out], 200);   
        }
    }

    public function getCategoryWiseProducts(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'product_category_id' => 'required',
            
        ]);
        if ($validator->fails()) {
            return response()->json(['response' => false, 'message'=>'validation error', 'error'=>$validator->errors()], 200);
        }
        $products = Product::where('products.product_category_id', '=', $request->product_category_id)->where('products.status', '=', 1)->get();

       $product_categories = ProductCategory::where('product_categories.id', '=', $request->product_category_id)->first();

       $user_id = $request->user_id;

        $final_out = array();
        $s = [];
        $out = [];
        if ($products) {

            if($user_id)
            {

              $t = DB::table('wishlist')
                    ->select('*')
                    ->where(['user_id'=>$user_id])
                    ->get();
             
             foreach ($t as $data) {

                $s[] =$data->product_id;

                }


            }


            foreach ($products as $key => $value) {

                // $explode_array = explode(',', $value->image);


                
                $explode_array_1 = explode('|', $value->image);

                $out['id'] = !empty($value->id)?$value->id:'';           
                $out['product_category_id'] = !empty($value->product_category_id)?$value->product_category_id:'';           
                $out['product_code'] = !empty($value->product_code)?$value->product_code:'';           
                $out['name'] = !empty($value->name)?$value->name:'';         
                $out['is_popular'] = !empty($value->is_popular)?$value->is_popular:'';         
                $out['PURITY'] = !empty($value->colour)?$value->colour:'';           
                $out['NET_WT'] = !empty($value->height)?$value->height . ' MM':'';           
                $out['ST_WT'] = !empty($value->width)?$value->width . ' MM':'';
                $out['DIA_WT'] = '';
                $out['gross_weight'] = !empty($value->gross_weight)?$value->gross_weight:'';           
                $out['description'] = !empty($value->description)?$value->description:'';
               

                $out['image'] = !empty($explode_array_1[0])?asset('/images/products/' . $explode_array_1[0]):'';
                $out['video'] = !empty($value->video)?asset('/videos/' . $value->video):'';

               if(!empty($s))
               {

                 if(in_array($value->id,$s))
                 {

                     $out['wishlisted'] = '1';

                 }
                 else
                 {

                    $out['wishlisted'] = '0';
                 }

               }
               else
               {
                  $out['wishlisted'] = '0';

               }
               
                
                $product_images = ProductImage::where('product_images.product_id', '=', $value->id)->where('product_images.status', '=', 1)->get();
                $final_out_1 = array();
                $out_1 = [];
                    if ($product_images) {
                        foreach ($product_images as $key_1 => $value_1) {
                            $out_1[$key_1]['id'] = !empty($value_1->id)?$value_1->id:'';           
                            $out_1[$key_1]['product_id'] = !empty($value_1->product_id)?$value_1->product_id:'';           
                            $out_1[$key_1]['name'] = !empty($value_1->name)?asset('/images/products/' . $value_1->name):'';
                            $out_1[$key_1]['is_thumbnail'] = !empty($value_1->is_thumbnail)?$value_1->is_thumbnail:'';           
                            $out_1[$key_1]['description'] = !empty($value_1->description)?$value_1->description:'';    
                        }                    
                    }
                    $out['product_images'] = $out_1;
                    $final_out[] = $out;
            }

           // print_r($final_out);die;
            return response()->json(['response' => true, 'message'=>'success','description'=>$product_categories->description,'remarks'=>$product_categories->remarks, 'data'=>$final_out], 200); 
        } else {
            return response()->json(['response' => false, 'message'=>'failure', 'data'=>$final_out], 200); 
        }
    }

    public function getPopularProducts()
    {
        $products = Product::join('product_categories', 'product_categories.id', '=', 'products.product_category_id')
            ->select('products.*', 'product_categories.name as product_category_name')
            ->where('products.is_popular', '=', 'yes')
            ->where('products.status', '=', 1)
            ->get();
        $final_out = array();
        $out = [];
        if ($products) {
            foreach ($products as $key => $value) {
                $explode_array = explode(',', $value->image);
                $explode_array_1 = explode('|', $explode_array[0]);
                $out['id'] = !empty($value->id)?$value->id:'';           
                $out['product_category_id'] = !empty($value->product_category_id)?$value->product_category_id:'';    
                $out['product_category_name'] = !empty($value->product_category_name)?$value->product_category_name:'';        
                $out['product_code'] = !empty($value->product_code)?$value->product_code:'';           
                $out['name'] = !empty($value->name)?$value->name:'';         
                $out['is_popular'] = !empty($value->is_popular)?$value->is_popular:'';         
                $out['colour'] = !empty($value->colour)?$value->colour:'';           
                $out['height'] = !empty($value->height)?$value->height . ' MM':'';           
                $out['width'] = !empty($value->width)?$value->width . ' MM':'';
                $out['gross_weight'] = !empty($value->gross_weight)?$value->gross_weight . ' GMS':'';           
                $out['description'] = !empty($value->description)?$value->description:'';           
                $out['image'] = !empty($explode_array_1[0])?asset('/images/products/' . $explode_array_1[0]):'';
                $out['video'] = !empty($value->video)?asset('/videos/' . $value->video):'';
                
                $product_images = ProductImage::where('product_images.product_id', '=', $value->id)->where('product_images.status', '=', 1)->get();
                $final_out_1 = array();
                $out_1 = [];
                    if ($product_images) {
                        foreach ($product_images as $key_1 => $value_1) {
                            $out_1[$key_1]['id'] = !empty($value_1->id)?$value_1->id:'';           
                            $out_1[$key_1]['product_id'] = !empty($value_1->product_id)?$value_1->product_id:'';           
                            $out_1[$key_1]['name'] = !empty($value_1->name)?asset('/images/products/' . $value_1->name):'';
                            $out_1[$key_1]['is_thumbnail'] = !empty($value_1->is_thumbnail)?$value_1->is_thumbnail:'';           
                            $out_1[$key_1]['description'] = !empty($value_1->description)?$value_1->description:'';    
                        }                    
                    }
                    $out['product_images'] = $out_1;
                    $final_out[] = $out;
            }
            return response()->json(['response' => true, 'message'=>'success', 'data'=>$final_out], 200); 
        } else {
            return response()->json(['response' => false, 'message'=>'failure', 'data'=>$final_out], 200); 
        }
    }

    public function getCelebrityPickBanner()
    {
        // $celebrity_picks = CelebrityPick::where('celebrity_picks.is_banner', '=', 'yes')->where('celebrity_picks.status', '=', 1)->first()->toArray();

         $data = DB::table('pages')
                ->select('celebrity_banner')
                ->first();

        $celebrity_picks['name'] = !empty($data->celebrity_banner)?asset('/images/product_categories/' .$data->celebrity_banner):'';
        if ($celebrity_picks) {
            return response()->json(['response' => true, 'message'=>'success', 'data'=>$celebrity_picks], 200);   
        } else {
            return response()->json(['response' => false, 'message'=>'failure'], 200);   
        }
    }

    public function getCelebrityPicks()
    {
        $celebrity_picks = CelebrityPick::where('celebrity_picks.status', '=', 1)->get();
        $final_out = array();
        if ($celebrity_picks) {
         
         $data = DB::table('pages')
                 ->select('celebrity_description','celebrity_remark')
                 ->where('id',1)
                 ->first();

            foreach ($celebrity_picks as $key => $value) {
                $out['id'] = !empty($value->id)?$value->id:'';           
                $out['name'] = !empty($value->name)?asset('/images/celebrity_picks/' . $value->name):'';          
                $out['is_banner'] = !empty($value->is_banner)?$value->is_banner:'';           
                $final_out[] = $out; 
            }
            return response()->json(['response' => true, 'message'=>'success','celebrity_description'=>$data->celebrity_description,'celebrity_remark'=>$data->celebrity_remark, 'data'=>$final_out], 200);   
        } else {
            return response()->json(['response' => false, 'message'=>'failure', 'data'=>$final_out], 200);   
        }
    }

    public function getCms()
    {
       
        $data = DB::table('pages')
                ->select('*')
                ->first();

         if ($data) {
            return response()->json(['response' => true, 'message'=>'success','about_us'=>$data->about_us,'terms_of'=>$data->terms_of,'policy'=>$data->policy], 200);   
        } else {
            return response()->json(['response' => false, 'message'=>'failure', 'data'=>$final_out], 200);   
        }
    }


    public function wishlist(Request $request)
    {
        

         $validator = Validator::make($request->all(), [
                    'user_id'        => 'required',
                    'product_id'     => 'required',
                   
                ]);

        if ($validator->fails()) {            
            return response()->json(['status' => 'error',
                                    'message'=>'The given data was invalid.',
                                    'errors'=> $validator->errors()], 200);
        }

     

      $data =    [   
                            'user_id'       => $request->get('user_id'),
                            'product_id'    => $request->get('product_id'),
                            'created_at'    => date('Y-m-d H:i:s'),
                            
                  ];



      $query =  DB::table('wishlist')->insert($data);

        if ($query) 
        {
           return response()->json(['response' => true, 'message'=>'Product added to wishlist successfully.'], 200);   
        } 
        else 
        {
            return response()->json(['response' => false, 'message'=>'failure'], 200);   
        }

        
    }


     public function getWishlist(Request $request)
    {
       
          
         $final_data=[]; 

         $validator = Validator::make($request->all(), [
                    'user_id'        => 'required',
                    
                   
                ]);

        if ($validator->fails()) {            
            return response()->json(['status' => 'error',
                                    'message'=>'The given data was invalid.',
                                    'errors'=> $validator->errors()], 200);
        }

        $user_id = $request->get('user_id');


     
        $data = DB::table('wishlist')
              ->select('a.*')
              ->join('products as a','a.id','=','wishlist.product_id')
              ->where(['wishlist.user_id'=>$user_id])
              ->get();



       if ($data) {

        foreach ($data as $key => $product) {

         
        $product_categories = ProductCategory::where('product_categories.id', '=',$product->product_category_id)->first();

        $product_images = ProductImage::where('product_images.product_id', '=', $product->id)->where('product_images.status', '=', 1)->get();

         $explode_array_1 = explode('|', $product->image);


          $product_images = ProductImage::where('product_images.product_id', '=', $product->id)->where('product_images.status', '=', 1)->get();
                $final_out_1 = array();
                $out_1 = [];
                    if ($product_images) {
                        foreach ($product_images as $key_1 => $value_1) {
                            $out_1[$key_1]['id'] = !empty($value_1->id)?$value_1->id:'';           
                            $out_1[$key_1]['product_id'] = !empty($value_1->product_id)?$value_1->product_id:'';           
                            $out_1[$key_1]['name'] = !empty($value_1->name)?asset('/images/products/' . $value_1->name):'';
                            $out_1[$key_1]['is_thumbnail'] = !empty($value_1->is_thumbnail)?$value_1->is_thumbnail:'';           
                            $out_1[$key_1]['description'] = !empty($value_1->description)?$value_1->description:'';    
                        }                    
                    }
            
       
         $final_data[] =    [   
                            'id'         => $product->id,
                            'product_code'    => $product->product_code,
                            
                            'name'    => $product->name,
                            'categories_name'=> $product_categories->name,
                            'description' =>$product->description,
                            'image'    => asset('/images/products/' .
                                $explode_array_1[0]),
                            'product_images'  =>$out_1,
                            
                            ];

          
        }



        return response()->json(['response' => true, 'message'=>'success','data'=>$final_data], 200);   
        } 
        else 
        {
            return response()->json(['response' => false, 'message'=>'You have not wishlisted any products yet','data'=>$final_data], 200);   
        }

    }

     public function removeWishlist(Request $request)
    {
        

         $validator = Validator::make($request->all(), [
                    'user_id'        => 'required',
                    'product_id'     => 'required',
                   
                ]);

        if ($validator->fails()) {            
            return response()->json(['status' => 'error',
                                    'message'=>'The given data was invalid.',
                                    'errors'=> $validator->errors()], 200);
        }

      
        $user_id       = $request->get('user_id');
        $product_id    = $request->get('product_id');

      $query =  DB::table('wishlist')
                ->where(['product_id'=>$product_id,'user_id'=>$user_id])
                ->delete();

        if ($query) 
        {
           return response()->json(['response' => true, 'message'=>'Product removed to wishlist successfully.'], 200);   
        } 
        else 
        {
            return response()->json(['response' => false, 'message'=>'failure'], 200);   
        }

        
    }



    public function createAppointment(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'customer_id' => 'required',
            'appointment_time' => 'required',
            'appointment_date' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(['response' => false, 'message'=>'validation error', 'error'=>$validator->errors()], 200);
        }

        $customer_name = DB::table('users')
                         ->select('name as customer_name')
                         ->where('users.id', '=', $request->customer_id)
                         ->first();


       
        $date = date('YmdHis');
        $no = str_shuffle('123456789023456789034567890456789905678906789078908909000987654321987654321876543217654321654321543214321321211');
        $random_no = substr($no, 0, 2);
        $random_str = $date.$random_no;
       
        $appointment_code = 'APP-'.$random_str; 
        DB::beginTransaction();
        $temp_array = [
            'appointment_code' => $appointment_code,
            'description' => !empty($request->description)?$request->description:'',
            'customer_id' => !empty($request->customer_id)?$request->customer_id:0,
            'appointment_date_time' => date('Y-m-d H:i:s',strtotime($request->appointment_date.' '. $request->appointment_time.':00 PM')),
            'created_at' => date('Y-m-d H:i:s'),
            'created_by' => $request->customer_id,
            'updated_at' => date('Y-m-d H:i:s'),
            'updated_by' => $request->customer_id,
            'status' => 1,
        ];


        $data = [
 
                  'appointment_code'=>$appointment_code,
                  'customer_name'   =>$customer_name->customer_name,
                  'appointment_date_time' => date('Y-m-d H:i:s',strtotime($request->appointment_date.' '. $request->appointment_time.':00 PM'))

        ];

        $email = 'customercare@khannajeweller.com';
       
        $query = Appointment::create($temp_array);
        if ($query) 
        {


            DB::commit();

             Mail::send(['html'=>'auth.appointmentMail'], $data, function($message) use($email) {
                     $message->to($email)->subject
                        ('khannajeweller');
                     $message->cc('vishaltechsaga@gmail.com')->subject
                        ('khannajeweller');
                     $message->from('customercare@khannajeweller.com',"khanna-jeweller Live");
                  });
            return response()->json(['response' => true, 'message'=>'Appointment created successfully!'], 200); 
        } else {
            DB::rollback();
            return response()->json(['response' => false, 'message'=>'Something went wrong!'], 200); 
        }
    }

    public function getAppointments(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'customer_id' => 'required'
        ]);
        if ($validator->fails()) {
            return response()->json(['response' => false, 'message'=>'validation error', 'error'=>$validator->errors()], 200);
        }

         //echo Carbon::now('Asia/Kolkata')->subMinutes(30)->toDateTimeString();die;
             $utcTimezone = new\DateTimeZone('Asia/Kolkata');
             
             
        $final_data =  DB::table('appointments AS ap')
        ->join('users AS u', 'u.id', '=', 'ap.executive_id')
                            ->where('ap.customer_id', '=', $request->customer_id)
                          //->where('ap.appointment_date_time', '>=',now())   
                         // ->where('ap.appointment_date_time', '>=',DB::raw('NOW()-INTERVAL 60 MINUTE')) 
                           ->where(DB::raw('STR_TO_DATE(DATE_FORMAT(CONVERT_TZ(ap.appointment_date_time,"+00:00","+0:00"), "%Y-%m-%d %h:%i:%p"),"%Y-%m-%d %h:%i:%p")'), '>=',DB::raw('STR_TO_DATE(DATE_FORMAT(CONVERT_TZ(NOW()-INTERVAL 1 HOUR,"+00:00","+5:30"), "%Y-%m-%d %h:%i:%p"),"%Y-%m-%d %h:%i:%p")'))  
                //->where(DB::raw('DATE_FORMAT(CONVERT_TZ(ap.appointment_date_time,"+00:00","+00:00"), "%Y-%m-%d %h:%i:%p")'), '>=',DB::raw('DATE_FORMAT(CONVERT_TZ(NOW()-INTERVAL 1 HOUR,"+00:00","+00:00"), "%Y-%m-%d %h:%i:%p")')) 
                             
                            ->select('ap.*','u.name AS executive_name')->get();  
            $trainers_List=array();
              if(($final_data->count()>0)){
                   foreach ($final_data as $key =>$item)
            {   
                $final_data2=array();             
               $time = new\DateTime($item->appointment_date_time, $utcTimezone ); 
               $time2= new\DateTime(date("Y-m-d h:i:s A", strtotime("-60 minutes", strtotime(date('Y-m-d h:i:s A'))))); 
            // if ($time>$time2) continue;
               if($time>$time2){
               $final_data[$key]->id=$item->id; 
               $final_data[$key]->appointment_code=$item->appointment_code;    
              /* $final_data2[$key]->product_id=$item->product_id; 
              $final_data2[$key]->customer_id=$item->customer_id; 
              $final_data2[$key]->executive_id=$item->executive_id;
              $final_data2[$key]->customer_meeting_url=$item->customer_meeting_url; 
              $final_data2[$key]->executive_meeting_url=$item->executive_meeting_url;
              $final_data2[$key]->description=$item->description;
              $final_data2[$key]->created_at=$item->created_at;
              $final_data2[$key]->created_by=$item->created_by;
              $final_data2[$key]->updated_at=$item->updated_at;
              $final_data2[$key]->updated_by=$item->updated_by;
              $final_data2[$key]->deleted_at=$item->deleted_at;
              $final_data2[$key]->status=$item->status;
              $final_data2[$key]->deleted_by=$item->deleted_by;
              $final_data2[$key]->class_id=$item->class_id;
              $final_data2[$key]->recording_url=$item->recording_url;
              $final_data2[$key]->executive_name=$item->executive_name;*/
              $final_data[$key]->indian_appointment_date_time=date( 'Y-m-d h:i:s A',strtotime($item->appointment_date_time));
              $final_data[$key]->indian_current_date_time=date( 'Y-m-d h:i:s A' );
              //$final_data[$key]->indian_compare_time=date("Y-m-d h:i:s A", strtotime("-60 minutes", strtotime(date('Y-m-d h:i:s A')))); 
              $final_data[$key]->indian_compare_time=date("Y-m-d h:i:s A", strtotime("-60 minutes", strtotime(date('Y-m-d h:i:s A'))));
               }
            }
              }
           
            //print_r($final_data2); 
           // exit();
           
        if(count($final_data)>0){    
           
        return response()->json(['response' => true, 'message'=>'success','data2'=>$final_data2,'data'=>$final_data], 200); 
        } else {
            return response()->json(['response' => false, 'message'=>'No data found','data'=>[]], 200); 
        }
    }

    
     public function getSlider()
    {

        $slider = DB::table('slider_images')
                 ->select('*')
                 ->where('status',1)
                 ->get();
       
        $data = array();

        if ($slider) 
        {
         
            foreach ($slider as $key => $value) 
            {
            
              $data[] = 
              [
            
                 'id' => !empty($value->id)?$value->id:'',
                 'slider_image' => !empty($value->slider_image)?asset('/images/slider_images/' . $value->slider_image):'',
              ];


           
            }
            
            return response()->json(['response' => true, 'message'=>'success','data'=>$data], 200);   
        } else {
            return response()->json(['response' => false, 'message'=>'failure', 'data'=>$final_out], 200);   
        }
    }


     public function addScreenshot(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'room_id'  => 'required',
            'username' => 'required'
        ]);
        if ($validator->fails()) {
            return response()->json(['response' => false, 'message'=>'validation error', 'error'=>$validator->errors()], 200);
        }


         $data =    [   
                            'room_id'       => $request->get('room_id'),
                            'username'      => $request->get('username'),
                            'created_at'    => date('Y-m-d H:i:s'),
                            
                  ];



      $query =  DB::table('screenshot')->insert($data);

        if ($query) 
        {
           return response()->json(['response' => true, 'message'=>'Screenshot added  successfully.'], 200);   
        } 
        else 
        {
            return response()->json(['response' => false, 'message'=>'failure'], 200);   
        }



    }


    public function getScreenshot(Request $request)
    {

         $validator = Validator::make($request->all(), [
            'room_id'  => 'required'
            
        ]);
        if ($validator->fails()) {
            return response()->json(['response' => false, 'message'=>'validation error', 'error'=>$validator->errors()], 200);
        }

         $username = DB::table('screenshot')
                     ->select('username','id')
                     ->where('room_id', '=', $request->room_id)
                     ->where('status', '=', 0)
                     ->get();

        if ($username) 
        {

            foreach ($username as $data) 
            {
                  $query =  DB::table('screenshot')
                            ->where('id',$data->id)
                            ->update(['status'=>1]);

            }


       
        return response()->json(['response' => true, 'username'=>$username], 200);   
           

        }
        else 
        {
            return response()->json(['response' => false, 'message'=>'failure'], 200);   
        }

    }

}

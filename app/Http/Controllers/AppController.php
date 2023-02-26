<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Auth;
use App\UserProduct;
use App\UserProductAttribute;
use App\UserProductAttributeValue;
class AppController extends Controller
{
    //
    /**
     * Get the City based on state selection.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function getcity(Request $request)
    {
       $state_id = $request->state_id;

       $city = DB::table('cities')->where('state_id',$state_id)->get();

       return response()->json($city);

    }

    /**
     * Get the State based on country selection.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function getstate(Request $request)
    {
       $country_id = $request->country_id;

       $state = DB::table('states')->where('country_id',$country_id)->get();

       return response()->json($state);

    }

    /**
     * Verify the email .
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function verify_email_link(Request $request)
    {

        $token = "";
         //validate
        if(request()->has('token'))
        {

             if(request()->filled('token'))
             {
                 $token = request()->token;
             }
             else{
                 echo "URL is missing!";
             }

        }
        else
        {
            echo "URL is missing!";
        }

        $token_data = DB::table('customers')
                   ->select('id','email_verification_token')
                   ->where(['email_verification_token'=>$token])
                   ->first();

        if($token_data !=null){

            DB::table('customers')->where(['id'=>$token_data->id])->update(['is_email_verified'=>1,'email_verification_token'=>NULL,'email_verified_at'=>date('Y-m-d H:i:s')]);

            Auth::guard('customer')->loginUsingId($token_data->id);

            Auth::guard('customer')->user()->save();

            return redirect('/myaccount');
        }
        else{
            echo "Link is not valid!";
        }

    }

    public function updateVendorProduct()
    {
        $user_products = UserProduct::whereNull('vendor_id')->get();

        if(count($user_products)>0)
        {
            UserProduct::whereNull('vendor_id')->update([
                'vendor_id' => 1
            ]);

            dd('done');
        }
    }

    public function updateProductAttribute(){
        DB::beginTransaction();
        try{
            $product_attributes = UserProductAttribute::from('user_product_attributes as up')
                                ->distinct('up.product_id')
                                ->select('u.*')
                                ->leftjoin('user_products as u','up.product_id','=','u.id')
                                // ->groupBy('up.product_id')
                                ->get()->pluck('id')->all();

            //dd($product_attributes);

            $products = UserProduct::from('user_products as u')
                                    ->select('u.*');
                                    if(count($product_attributes)>0)
                                    {
                                        $products->whereNotIn('u.id',$product_attributes);
                                    }

            $products = $products->get();

            //dd($products);

            if(count($products)>0)
            {
                foreach($products as $product)
                {
                    $sku = mt_rand(100000,999999);

                    $attributes = DB::table('product_categories as c')
                                ->select('a.*')
                                ->join('attribute_masters as a','a.category_id','=','c.id')
                                ->whereIn('c.id',explode(',',$product->category_id))
                                ->where('c.parent_id',0)
                                ->where('a.status','<>','9')
                                ->orderBy('a.list_order','asc')
                                ->get()->pluck('name','id')->all();

                    if(count($attributes)==0)
                    {
                        $data = [
                            'product_id' => $product->id,
                            'attribute_id' => NULL,
                            'attribute_name' => NULL,
                            'sku' => $sku,
                            'price' => 50,
                            'discounted_price' =>50,
                            'quantity' =>20,
                            'created_at' => date('Y-m-d H:i:s')
                        ];

                        $user_attribute = UserProductAttribute::create($data);

                        $q_data = [
                            'product_id' => $product->id,
                            'attribute_id' => NULL,
                            'attribute_name' => 'OnePrice',
                            'attribute_value' => 'OnePrice',
                            'product_attribute_id' => $user_attribute->id,
                            'created_at' => date('Y-m-d H:i:s')
                        ];

                        UserProductAttributeValue::create($q_data);
                    }
                    else
                    {
                        $attribute_id = [];
                        $attribute_name = [];

                        $attribute_id = array_keys($attributes);

                        $attribute_name = array_values($attributes);

                        $data = [
                            'product_id' => $product->id,
                            'attribute_id' => count($attribute_id) > 0 ? implode(',',$attribute_id) : NULL,
                            'attribute_name' => count($attribute_name) > 0 ? implode(',',$attribute_name) : NULL,
                            'sku' => $sku,
                            'price' => 50,
                            'discounted_price' =>50,
                            'quantity' =>20,
                            'created_at' => date('Y-m-d H:i:s')
                        ];

                        $user_attribute = UserProductAttribute::create($data);

                        foreach($attributes as $key => $attr)
                        {
                            $attr_value = 'Default';

                            if(stripos($attr,'Size')!==false)
                            {
                                $attr_value = 'Small';
                            }
                            elseif(stripos($attr,'Color')!==false)
                            {
                                $attr_value = 'Red';
                            }

                            $q_data = [
                                'product_id' => $product->id,
                                'attribute_id' => $key,
                                'attribute_name' => strtolower($attr),
                                'attribute_value' => $attr_value,
                                'product_attribute_id' => $user_attribute->id,
                                'created_at' => date('Y-m-d H:i:s')
                            ];

                            UserProductAttributeValue::create($q_data);
                        }
                    }
                }

                DB::commit();

                dd('done');
            }

        }
        catch (\Exception $e) {
            DB::rollback();
            // something went wrong
            return $e;
        }



    }
}

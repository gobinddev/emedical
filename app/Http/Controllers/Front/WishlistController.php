<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
//use Darryldecode\Cart\Cart;
use Illuminate\Support\Facades\Auth;
use App\UserProduct;
use App\UserProductAttribute;
use App\UserProductAttributeValue;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Session;
use App\Wishlist;
use App\Helpers\Helper;
use Illuminate\Support\Facades\Validator;

class WishlistController extends Controller
{
    //
    public function index()
    {
        $user_id = Auth::guard('customer')->user()->id;

        $wishItems = Wishlist::where('user_id',$user_id)->get();

        // dd($wishItems);

        return view('front.wishlist',compact('wishItems'));
    }

    public function add(Request $request)
    {
        $user_id = Auth::guard('customer')->user()->id;

        $product_id = Crypt::decryptString($request->id);

        $product = UserProduct::where('id',$product_id)->first();

        $product_attribute = Helper::getProductAttributeByPrice($product->id);

        $data = [
            'user_id' => $user_id,
            'product_id' => $product->id,
            'qty' => 1,
            'price' => $product_attribute->discounted_price,
            'product_attribute_id' => $product_attribute->id
        ];

        Wishlist::create($data);

        $wish_count = Wishlist::where('user_id',$user_id)->count();

        return response()->json([
            'success' => true,
            'count' => $wish_count
        ]);
    }

    public function addToCart(Request $request)
    {
        $user_id = Auth::guard('customer')->user()->id;

        $attributes = array();

        $wishlist_id = Crypt::decryptString($request->id);

        // $request->validate([
        //     'quantity-'.$wishlist_id  => 'required|integer|min:1',
        // ],
        // [
        //     'quantity-'.$wishlist_id .'.integer' => 'The quantity must be numeric',
        //     'quantity-'.$wishlist_id .'.min' => 'The quantity must be minimum 1'
        // ]
        // );

        $rules = [
            'quantity-'.$wishlist_id  => 'required|integer|min:1',
        ];

        $custom = [
            'quantity-'.$wishlist_id .'.integer' => 'The quantity must be numeric',
            'quantity-'.$wishlist_id .'.min' => 'The quantity must be minimum 1'
        ];

        $validator = Validator::make($request->all(),$rules,$custom);

        if($validator->fails())
        {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ]);
        }

        if($request->input('quantity-'.$wishlist_id)!=NULL)
        {
            $qty = $request->input('quantity-'.$wishlist_id);
        }

        $wishlist = Wishlist::where('id',$wishlist_id)->first();

        $product = UserProduct::where('id',$wishlist->product_id)->first();


        // Clear the Cart if Product are from Different Vendor

        $cartItems = \Cart::session($user_id)->getContent();

        if(count($cartItems)>0)
        {
            $product_attr_id = $cartItems->pluck('id')->all();

            array_push($product_attr_id,$wishlist->product_attribute_id);

            $product_attributes = UserProductAttribute::from('user_product_attributes as up')
                                    ->distinct('up.product_id')
                                    ->select('u.*')
                                    ->leftjoin('user_products as u','up.product_id','=','u.id')
                                    ->whereIn('up.id',$product_attr_id)
                                    ->groupBy('up.product_id')
                                    ->get()->pluck('id')->all();

            $vendors = UserProduct::from('user_products as u')
                                    ->distinct('u.vendor_id')
                                    ->select('u.*')
                                    ->whereIn('u.id',$product_attributes)
                                    ->groupBy('vendor_id')
                                    ->get();


            if(count($vendors)>1)
            {
                \Cart::session($user_id)->clear();
            }

        }

        $product_attribute = UserProductAttribute::where('id',$wishlist->product_attribute_id)->first();

        $product_attribute_value = UserProductAttributeValue::where('product_attribute_id',$product_attribute->id)->get();

        if(count($product_attribute_value)>0)
        {
            $attributes = $product_attribute_value->pluck('attribute_value','attribute_name')->all();
        }

        \Cart::session($user_id)->add(array(
            'id' => $product_attribute->id, // inique row ID
            'name' => $product->product_title,
            'price' =>  $product_attribute->discounted_price,
            'quantity' => $qty,
            'attributes' => $attributes,
            'associatedModel' => $product
        ));

        Session::flash('message', 'Cart Item Added Successfully !!');

        Session::flash('alert-class', 'alert-success');

        // return redirect()->back();

        return response()->json([
            'success' => true
        ]);

    }

    public function destroy(Request $request)
    {
        $user_id = Auth::guard('customer')->user()->id;

        $wishlist_id = Crypt::decryptString($request->id);

        Wishlist::where(['user_id'=>$user_id,'product_id'=>$wishlist_id])->delete();

        Session::flash('message', 'Wishlist Item Removed Successfully !!');

        Session::flash('alert-class', 'alert-danger');

        return redirect()->back();
    }

}

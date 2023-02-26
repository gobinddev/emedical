<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\UserProduct;
use App\UserProductAttribute;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Session;
use App\Helpers\Helper;

class AjaxController extends Controller
{
    //

    public function checkVendorProduct(Request $request)
    {
        $product_id = Crypt::decryptString($request->product_id);

        if(Auth::guard('customer')->check())
        {
            $user_id = Auth::guard('customer')->user()->id;

            // Clear the Cart if Product are from Different Vendor

            $vendor_count = 0;

            $cartItems = \Cart::session($user_id)->getContent();

            if(count($cartItems)>0)
            {
                $product_attr_id = $cartItems->pluck('id')->all();

                $product_attributes = UserProductAttribute::from('user_product_attributes as up')
                                        ->distinct('up.product_id')
                                        ->select('u.*')
                                        ->leftjoin('user_products as u','up.product_id','=','u.id')
                                        ->whereIn('up.id',$product_attr_id)
                                        ->groupBy('up.product_id')
                                        ->get()->pluck('id')->all();

                array_push($product_attributes,$product_id);

                $product_attributes = array_unique($product_attributes);

                $vendors = UserProduct::from('user_products as u')
                                        ->distinct('u.vendor_id')
                                        ->select('u.*')
                                        ->whereIn('u.id',$product_attributes)
                                        ->groupBy('vendor_id')
                                        ->get()->pluck('vendor_id')->all();

                $vendor_count = count($vendors);
            }

            return response()->json([
                'success' => true,
                'vendor_cnt' => $vendor_count
            ]);
        }
        else
        {
            return response()->json([
                'success' =>false
            ]);
        }

    }
}

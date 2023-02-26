<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\UserProductAttribute;
class CmsController extends Controller
{
    //

     /**
     * Get the City based on state selection.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
       $slug = $request->slug;

       $cms = DB::table('cms')->where('slug',$slug)->first();

       if($cms)
       {
         if(stripos($cms->slug,'rent')!==false)
         {
             $rent_products = UserProductAttribute::from('user_product_attributes as ua')
                                ->distinct('ua.product_id')
                                ->select('ua.*',DB::raw("MIN(ua.discounted_price) as dis_price"),'u.product_title','u.short_description','u.description','u.specification','u.in_box','u.is_popular','u.is_return','u.is_featured','u.status','u.rent_price','u.rent_deposit')
                                ->join('user_products as u','ua.product_id','=','u.id')
                                ->where('u.status','1')
                                ->where('u.is_rent',1)
                                ->whereNotNull('u.vendor_id');

            $rent_products=$rent_products->groupBy('ua.product_id')->orderBy('u.created_at','desc')->get();

            return view('front.rent',compact('cms','rent_products'));
         }
         else
            return view('front.cms',compact('cms'));
       }
       else
            return view('404');
    }

}

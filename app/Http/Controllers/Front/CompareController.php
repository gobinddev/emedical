<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helpers\Helper;
use App\UserProduct;
use DB;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CompareController extends Controller
{
    //
    public function index(){
        $session = [];
        if(session()->exists('compareids'))
        {
            $session = session()->get('compareids');
        }
        $products = UserProduct::whereIn('id',$session)->get();
        $i=0;
        foreach ($products as $product) {
            // $products[$i]['attributes'] = DB::table('user_product_attributes')->select('*')->where('product_id',$product->id)->get();
            $products[$i]['attributes'] = Helper::getProductAttributeByPrice($product->id);
            $products[$i]['images'] = Helper::get_product_thumbnail_image($product->id);
            $i++;
        }

        //dd($products);
        return view('front.compare',compact('products'));
    }

    public function addtocompare(Request $request){
        $product_id = $request->get('product_id');
        //print_r(Session::get('compareids'));
        $compareids = (session()->has('compareids'))?session()->get('compareids'):[];
        if(count($compareids)>=2)
        {
            return response()->json([
                'success' => false,
                'message' => 'No Product Add to Compare'
            ]);
        }
        $compareids[] = $product_id;
        session()->put('compareids',array_unique($compareids));
        session()->save();
        $count  = count(session()->get('compareids'));

        return response()->json([
            'success' => true,
            'message' => "$count Product(s) ha've been added for comparision",
            'count' => $count
        ]);
        // echo "$count Product(s) ha've been added for comparision";

    }

    public function removeCompare(Request $request)
    {
        $session = [];
        $product_id = Crypt::decryptString($request->product_id);

        $session = session()->get('compareids');

        if (($key = array_search($product_id, $session)) !== false) {

            unset($session[$key]);

            session()->forget('compareids');

            session()->put('compareids',$session);

            Session::flash('message', "Product has been removed for comparision !!");

            Session::flash('alert-class', 'alert-danger');
        }
        else
        {
            Session::flash('message', "Something Went Wrong !!");

            Session::flash('alert-class', 'alert-danger');
        }

        return response()->json([
            'success' => true
        ]);

    }
}

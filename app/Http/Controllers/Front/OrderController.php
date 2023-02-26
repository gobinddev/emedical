<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Order;
use App\OrderItem;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Crypt;
class OrderController extends Controller
{
    //
    public function details(Request $request)
    {
        $order_id = Crypt::decryptString($request->id);
        $order = Order::where('id',$order_id)->first();
        $order_items = OrderItem::from('order_items as oi')
                        ->select('oi.*')
                        ->join('orders as o','o.id','=','oi.order_id')
                        ->where('oi.order_id',$order_id)
                        ->get();
        return view('front.order.details',compact('order','order_items'));
    }
}

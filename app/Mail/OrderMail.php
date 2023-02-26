<?php

namespace App\Mail;

use App\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Session;
use DB;

class OrderMail extends Mailable
{
    use Queueable, SerializesModels;

    public $order; 
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function construct(Order $order)
    {
        $this->order = $order;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $user_id = Session::get('user_id');
        $mailitems = DB::table('orders')
                           ->join('customers', 'customers.id', '=', 'orders.user_id')
                           ->join('order_items', 'order_items.order_id', '=', 'orders.id')
                           ->join('user_products', 'user_products.id', '=', 'order_items.product_id')
                           ->select('customers.display_name','customers.email','order_items.price','order_items.quantity','user_products.product_title','orders.sub_total','orders.order_no')
                           ->where('customers.id', $user_id)
                           ->get();
     return $this->subject('Order Confirmation')->view('mails.order-email',compact('mailitems'));
    }
}
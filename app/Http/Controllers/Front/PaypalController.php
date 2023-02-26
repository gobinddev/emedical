<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Srmklive\PayPal\Services\PayPal as PayPalClient;
use Illuminate\Support\Facades\Session;
use App\Order;
use App\OrderItem;
use App\UserProduct;
use App\UserProductAttribute;

class PaypalController extends Controller
{

    /**
     * create transaction.
     *
     * @return \Illuminate\Http\Response
     */
    public function createTransaction()
    {
        return view('front.transaction');
    }

    /**
     * Responds with a welcome message with instructions
     *
     * @return \Illuminate\Http\Response
     */
    public function payment(Request $request)
    {
        $pay_session = [];
        $pay_session = \Session::get('paypal_pay');
        if($pay_session!=NULL)
        {
            $total_price = \Session::get('paypal_pay');
            $provider = new PayPalClient;
            $provider->setApiCredentials(config('paypal'));
            $paypalToken = $provider->getAccessToken();

            $response = $provider->createOrder([
                "intent" => "CAPTURE",
                "application_context" => [
                    "return_url" => url('success'),
                    "cancel_url" => url('cancel'),
                ],
                "purchase_units" => [
                    0 => [
                        "amount" => [
                            "currency_code" => "USD",
                            "value" => $total_price
                        ]
                    ]
                ]
            ]);

            if (isset($response['id']) && $response['id'] != null) {

                // redirect to approve href
                foreach ($response['links'] as $links) {
                    if ($links['rel'] == 'approve') {
                        return redirect()->away($links['href']);
                    }
                }

                return redirect()
                    ->route('myaccount')
                    ->with('error', 'Something went wrong.');

            } else {
                return redirect()
                    ->route('myaccount')
                    ->with('error', $response['message'] ?? 'Something went wrong.');
            }
        }
        else
        {
            return redirect()
                    ->route('myaccount')
                    ->with('error', 'Session Timeout.');
        }

    }

    /**
     * Responds with a welcome message with instructions
     *
     * @return \Illuminate\Http\Response
     */
    public function cancel(Request $request)
    {
        Session::forget('paypal_pay');
        return redirect()
        ->route('myaccount')
        ->with('error', $response['message'] ?? 'You have canceled the transaction.');
    }

    /**
     * Responds with a welcome message with instructions
     *
     * @return \Illuminate\Http\Response
     */
    public function success(Request $request)
    {
        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $provider->getAccessToken();
        $response = $provider->capturePaymentOrder($request['token']);

        if (isset($response['status']) && stripos($response['status'],'COMPLETED')!==false) {

            $pay_session = Session::get('paypal_pay');

            $order_id = $pay_session['order_id'];

            $order = Order::where('id',$order_id)->first();

            Order::find($order->id)->update(['status'=>1,'is_paid'=>1,'payment_received_at'=>date('Y-m-d H:i:s')]);

            $order_item = OrderItem::where('order_id',$order->id)->get();

            if(count($order_item)>0)
            {
                foreach($order_item as $item)
                {
                    $product = UserProductAttribute::where('id',$item->product_attribute_id)->first();

                    $total_quantity = $product->quantity;

                    $total_quantity = $total_quantity - $item->quantity;

                    UserProductAttribute::find($product->id)->update(['quantity'=>$total_quantity]);
                }
            }

            Session::forget('paypal_pay');

            return redirect()
                ->route('myaccount')
                ->with('success', 'Order Has Been Placed & Transaction completed.');
        } else {
            return redirect()
                ->route('myaccount')
                ->with('error', $response['message'] ?? 'Something went wrong.');
        }
    }
}

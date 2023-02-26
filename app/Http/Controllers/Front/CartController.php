<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Darryldecode\Cart\Cart;
use Illuminate\Support\Facades\Auth;
use App\UserProduct;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Session;
use App\CustomerAddress;
use DB;
use App\Mail\OrderMail;
use Illuminate\Support\Facades\Validator;
use App\Order;
use App\OrderItem;
use App\UserProductAttribute;
use App\UserProductAttributeValue;
use Illuminate\Support\Facades\Mail;

class CartController extends Controller
{
     public function index(Request $request)
    {
        $customer_id = Session::get('user_id');
       $data = DB::table('cart')
              ->select('cart.*','user_product_images.file_name')
              ->join('user_product_images', 'cart.product_id', '=', 'user_product_images.product_id')
              ->where('customer_id', $customer_id)->get();

        return view('front.cart',compact('data'));
    }

    public function add(Request $request)
    {
        $user_id = Auth::user()->id;

        $qty = 1;

        $product_variant_id = NULL;

        $attributes = array();

        // $request->validate([
        //     'quantity' => 'sometimes|required|integer|min:1',
        //     'product_variant' => 'sometimes|required',
        // ],
        // [
        //     'quantity.integer' => 'The quantity must be numeric',
        //     'quantity.min' => 'The quantity must be minimum 1',
        //     'product_variant.required' => 'Select the Product Variant'
        // ]
        // );

        $rules = [
            'quantity' => 'sometimes|required|integer|min:1',
            'product_variant' => 'sometimes|required',
        ];

        $custom = [
            'quantity.integer' => 'The quantity must be numeric',
            'quantity.min' => 'The quantity must be minimum 1',
            'product_variant.required' => 'Select the Product Variant'
        ];

        $validator = Validator::make($request->all(),$rules,$custom);

        if($validator->fails())
        {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ]);
        }

        if($request->quantity!=NULL)
        {
            $qty = $request->quantity;
        }

        if($request->product_variant!=NULL)
        {
            $product_variant_id = Crypt::decryptString($request->product_variant);
        }


        $product_id = Crypt::decryptString($request->id);

        $product = UserProduct::where('id',$product_id)->first();

        $product_attribute = UserProductAttribute::where('id',$product_variant_id)->first();

        $product_attribute_value = UserProductAttributeValue::where('product_attribute_id',$product_attribute->id)->get();

        if(count($product_attribute_value)>0)
        {
            $attributes = $product_attribute_value->pluck('attribute_value','attribute_name')->all();
        }


        $cartItems = \Cart::session($user_id)->getContent();

        if(count($cartItems)>0)
        {
            $product_attr_id = $cartItems->pluck('id')->all();

            array_push($product_attr_id,$product_attribute->id);

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
                                    ->get()->pluck('vendor_id')->all();
         
          if(count($vendors)>1)
            {
                \Cart::session($user_id)->clear();
            }

        }

        $cartItem = \Cart::session($user_id)->get($product_attribute->id);

        if($cartItem!=NULL)
        {
            \Cart::session($user_id)->update($product_attribute->id, array(
                'name' => $product->product_title,
                // 'quantity' => $request->quantity==NULL ? $qty : array(
                //                                                         'relative' => false,
                //                                                         'value' => $qty
                //                                                     ),
                 'quantity' => $qty,
                 'price' =>  $product_attribute->discounted_price,
              ));
        }
        else
        {
            \Cart::session($user_id)->add(array(
                'id' => $product_attribute->id, // inique row ID
                'name' => $product->product_title,
                'price' =>  $product_attribute->discounted_price,
                'quantity' => $qty,
                'attributes' => $attributes,
                'associatedModel' => $product
            ));
        }

        Session::flash('message', 'Cart Item Added Successfully !!');

        Session::flash('alert-class', 'alert-success');

        // return redirect()->route('customer.cart.index');

        return response()->json([
            'success' => true
        ]);
    }

    public function update(Request $request)
    {
        $user_id = Session::get('user_id');

        $request->validate([
            'quantity.*' => 'required|integer|min:1',
        ],
        [
            'quantity.*.integer' => 'The quantity must be numeric',
            'quantity.*.min' => 'The quantity must be minimum 1'
        ]
        );

        $items = $request->item_id;

        if($items!=NULL && count($items) > 0)
        {
            foreach($items as $key => $item_id)
            {
                $qty = 1;

                if($request->quantity!=NULL && $request->quantity[$key]!=NULL)
                {
                    $qty = $request->quantity[$key];
                }

                // $product_id = Crypt::decryptString($item_id);

                // $product = UserProduct::where('id',$product_id)->first();

                $product_attribute_id = Crypt::decryptString($item_id);

                $product_attribute = UserProductAttribute::from('user_product_attributes as up')
                                    ->select('up.*','u.product_title')
                                    ->join('user_products as u','up.product_id','=','u.id')
                                    ->where('up.id',$product_attribute_id)
                                    ->first();

                \Cart::session($user_id)->update($product_attribute->id, array(
                    'name' => $product_attribute->product_title,
                    'quantity' => array(
                        'relative' => false,
                        'value' => $qty
                     ),
                     'price' =>  $product_attribute->discounted_price,
                ));

            }

            Session::flash('message', 'Cart Item Updated Successfully !!');

            Session::flash('alert-class', 'alert-success');

        }
        else
        {
            Session::flash('message', 'Something Went Wrong !!');

            Session::flash('alert-class', 'alert-danger');
        }

        return redirect()->back();
    }

    public function destroy(Request $request)
    {
        $user_id = Auth::guard('customer')->user()->id;

        $item_id = Crypt::decryptString($request->id);

        \Cart::session($user_id)->remove($item_id);

        Session::flash('message', 'Cart Item Removed Successfully !!');

        Session::flash('alert-class', 'alert-danger');

        return redirect()->back();
    }

    public function checkout(Request $request)
    {
        
        $user_id = Session::get('user_id');
        $cartItems = DB::table('cart')->where('customer_id', $user_id)->get();
        $customeradd = CustomerAddress::where('customer_id',$user_id)->get();
        $customer = DB::table('customers')->where('id',$user_id)->get();
        $countries = DB::table('countries')->get();
        $states = DB::table('states')->where('country_id','101')->get();
        
        if(count($cartItems)==0)
        {
          return redirect('logincustomer');
        }

        return view('front.checkout', compact('cartItems','customer','countries','states','customeradd'));

    }

    public function place_order(Request $request)
    {
     
        $user_id = Session::get('user_id');
        $rules = [
            'payment-method' => 'required|in:cash,paypal',
            'accept_terms' => 'required'
        ];

        $custom = [
            'payment-method.required' => 'Select the Payment Method',
            'payment-method.in' => 'Payment Method Must be in Cash or Paypal',
            'accept_terms.required' => 'Please Accept the Terms & Conditions !!'
        ];

        $validator = Validator::make($request->all(),$rules,$custom);

        if($validator->fails())
        {
            return redirect()->back()->with('errors',$validator->errors());
        }

      DB::beginTransaction();

      try{
            $bill_addr_id = NULL;
            $bill_check = $request->bill_address!=null && $request->bill_address!='new' ? Crypt::decryptString($request->bill_address) : 'new';
           if($bill_check==null || stripos($bill_check,'new')!==false)
            {
                $rules = [
                    'name' => 'required|regex:/^[a-zA-Z ]+$/u|min:1|max:255',
                    'email' => 'required|email:rfc,dns',
                    'phone' => 'required|regex:/^\\d{10}$/',
                    'address_line_1' => 'required',
                    'address_line_2' => 'nullable',
                    'country' => 'required',
                    'state' => 'required',
                    'city' => 'required',
                    'zip_code' => 'required|numeric|digits:6',
                   
                ];

                $custom = [
                    'name.regex' => 'The name field must be string',
                    'phone.required' => 'The phone no field is required',
                    'phone.regex' => 'Phone No Must Be 10-digit Number',
                    'address_line_1.required' => 'The address field is required'
                ];

                $validator = Validator::make($request->all(),$rules,$custom);

                if($validator->fails())
                {
                   return redirect()->back()->with('errors',$validator->errors());
                }

            

                $phone = preg_replace('/\D/','',$request->phone);

                $data = [
                    'customer_id' => $user_id,
                    'name' => $request->input('name'),
                    'email' => $request->input('email'),
                    'phone' => $phone,
                    'country_id' => $request->input('country'),
                    'state_id' => $request->input('state'),
                    'city_id' => $request->input('city'),
                    'geo_city' => $request->input('city'),
                    'pincode' => $request->input('zip_code'),
                    'address_line_1' => $request->input('address_line_1'),
                    'address_line_2' => $request->input('address_line_2'),
                    'created_at' => date('Y-m-d H:i:s')
                ];

                $query = CustomerAddress::create($data);

                $bill_addr_id = $query->id;
            }
            else
            {
                $bill_addr_id = $bill_check;
            }

            $order_no = uniqid('E-medical-Order-');

            $cartItems =DB::table('cart')->where('customer_id',$user_id)->get();

            if(count($cartItems)>0)
            {
                $product_id = $cartItems->pluck('product_id')->all();
               
            }

            $admin_setting = DB::table('admin_settings')->latest()->first();

            if(stripos($request->input('payment-method'),'cash')!==false)
            {

                $data = [
                    'order_no' => $order_no,
                    'user_id' => $user_id,
                    'delivery_address_id' => $bill_addr_id,
                    'sub_total' => $request->input('subtotal'),
                    'total_price' => $request->input('subtotal'),
                    'payment_method' => 1,
                    'status' => 1,
                    'ordered_at' => date('Y-m-d H:i:s'),
                    'created_at' => date('Y-m-d H:i:s')
                ];

                $order = Order::create($data);

                if(count($cartItems)>0)
                {
                    foreach($cartItems as $item)
                    {
                        $data_item=[
                            'order_id' => $order->id,
                            'user_id' => $user_id,
                            'product_id' => $item->product_id,
                            'base_price' => $item->product_price,
                            'price' => $item->total_price,
                            'quantity' => $item->product_qty,
                        ];

                        $order_item = OrderItem::create($data_item);
                        $product = UserProduct::where('id',$item->product_id)->first();
                        $total_quantity = $product->quantity;
                        $total_quantity = $total_quantity - $item->product_qty;
                        UserProduct::find($product->id)->update(['quantity'=>$total_quantity]);
                    }
                }
                 DB::table('cart')->where('customer_id',$user_id)->delete(); 
                  $mailitems = DB::table('orders')
                           ->join('customers', 'customers.id', '=', 'orders.user_id')
                           ->join('order_items', 'order_items.order_id', '=', 'orders.id')
                           ->join('user_products', 'user_products.id', '=', 'order_items.product_id')
                           ->select('customers.display_name','customers.email','order_items.price','order_items.quantity','user_products.product_title','orders.sub_total','orders.order_no')
                           ->where('order_items.user_id', $user_id)
                           ->get();
                 
                  $ordermail = $mailitems[0]->email;
                  Mail::to($ordermail)->send(new OrderMail($mailitems));
                  $url = route('myaccount');

                 DB::commit();
                 Session::flash('message', 'Order Has Been Placed Successfully !!');
                 Session::flash('alert-class', 'alert-success');
                
                return redirect('thank-you');
            }
            else if(stripos($request->input('payment-method'),'paypal')!==false)
            {
              
                   $data = [
                    'order_no' => $order_no,
                    'user_id' => $user_id,
                    'delivery_address_id' => $bill_addr_id,
                    'sub_total' => \Cart::session($user_id)->getTotal(),
                    'total_price' => \Cart::session($user_id)->getTotal(),
                    'payment_method' => 1,
                    'status' => 1,
                    'ordered_at' => date('Y-m-d H:i:s'),
                    'created_at' => date('Y-m-d H:i:s')
                 ];

                $order = Order::create($data);

                if(count($cartItems)>0)
                {
                    foreach($cartItems as $item)
                    {
                        $data_item=[
                            'order_id' => $order->id,
                            'user_id' => $user_id,
                            'product_id' => $item->product_id,
                            'base_price' => $item->product_price,
                            'price' => $item->total_price,
                            'quantity' => $item->product_qty,
                        ];

                        $order_item = OrderItem::create($data_item);
                        $product = UserProduct::where('id',$item->product_id)->first();
                        $total_quantity = $product->quantity;
                        $total_quantity = $total_quantity - $item->quantity;
                        UserProduct::find($product->id)->update(['quantity'=>$total_quantity]);
                    }
                  DB::table('cart')->where('customer_id',$user_id)->delete(); 
                   
                   
               
                }

                $url = route('myaccount');

                DB::commit();
                 Session::flash('message', 'Order Has Been Placed Successfully !!');
                 Session::flash('alert-class', 'alert-success');
                return redirect('thank-you');
             }
      }
      catch (\Exception $e) {
        DB::rollback();
        
        return $e;
      }

    }




}

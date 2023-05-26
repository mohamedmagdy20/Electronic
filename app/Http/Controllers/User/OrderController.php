<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderDetails;
use Illuminate\Http\Request;
use Srmklive\PayPal\Services\ExpressCheckout;

class OrderController extends Controller
{
    //
    public function checkOut(Request $request)
    {
        // return $request->all();
        $request->validate([
            'phone'=>'required',
            'address'=>'required'
        ]);
        if($request->type == 'manual')
        {
            $order = Order::create(array_merge($request->all(),['client_id'=>auth('client')->user()->id,'status'=>'pending','code'=>mt_rand(10000000,99999999)]));
            $carts = Cart::where('client_id',auth('client')->user()->id)->get();
            foreach($carts as $cart)
            {
                OrderDetails::create([
                    'product_id'=>$cart->product_id,
                    'count'=>$cart->count,
                    'order_id'=>$order->id
                ]);
                $cart->delete();
            }
            return redirect()->route('home')->with('success','Order Done');
        }else if($request->type == 'paypal'){
            // Paypal Integration
            $order = Order::create(array_merge($request->all(),['client_id'=>auth('client')->user()->id,'status'=>'pending','code'=>mt_rand(10000000,99999999)]));
            $carts = Cart::where('client_id',auth('client')->user()->id)->get();
            foreach($carts as $cart)
            {
                OrderDetails::create([
                    'product_id'=>$cart->product_id,
                    'count'=>$cart->count,
                    'order_id'=>$order->id
                ]);
                $cart->delete();
            }
            return redirect()->route('payment');


        }

    }

    public function payment()
    {
        $data = [];
        $data['items'] = [
            [
                'name'=>'Demo',
                'price'=>100,
                'description'=>'Demo',
                'qty'=>1
            ],
        ];
        $data['invoice_id'] = 1;
        $data['invoice_description']= "Order Invoivce";
        $data['return_url'] = route('payment.success');
        $data['cancel_url'] = route('cencel');
        $data['total'] = 100;

        $provider = new ExpressCheckout;
        $response = $provider->setExpressCheckout($data); 
        $response = $provider->setExpressCheckout($data,true);
        
        return redirect($response['paypal_link']);
    }

    public function cencel()
    {
        dd('You are Cencelled this Payment');
    }

    public function success(Request $request)
    {
        $provider = new ExpressCheckout;
        $response = $provider->getExpressCheckoutDetails($request->token);
        
        if(in_array(strtoupper($response['ACK']),['SUCCESS','SUCCESSWITHWARNING'])){
            return redirect()->route('home')->with('success','Order Submited');
        }
        else
        {
            return redirect()->back()->with('error','Error Accure');
      
        }
    }



}

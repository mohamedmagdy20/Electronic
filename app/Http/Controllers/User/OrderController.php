<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderDetails;
use Illuminate\Http\Request;

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
            $order = Order::create(array_merge($request->all(),['client_id'=>auth('client')->user()->id,'status'=>'pending']));
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
            return 'paypal';
        }

    }
}

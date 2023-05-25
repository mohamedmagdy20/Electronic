<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use App\Models\Cart;
use Illuminate\Http\Request;

class CartController extends BaseController
{
    //
    public function __construct(Cart $model)
    {
        parent::__construct($model);
    }

    public function index()
    {
        $total = 0;
        $data = $this->model->with(['product'=>function($q){
            $q->with('images');
        }])->get();
        $cartCount = Cart::where('client_id',auth('client')->user()->id)->count();
        foreach($data as $d)
        {
            $total += $d->product->priceOut * $d->count;
        }
        return view('user.cart',compact('data','cartCount','total'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'count'=>'required',
            'product_id'=>'required',
        ]);
        $this->model->create(array_merge( $request->all(),['client_id'=>auth('client')->user()->id]));
        return redirect()->route('all.products')->with('success','Product Add To Cart');
    }

    public function delete($id)
    {
        $cart =Cart::findOrFail($id);
        $cart->delete();
        return redirect()->back()->with('success','Item Deleted');
    }

}

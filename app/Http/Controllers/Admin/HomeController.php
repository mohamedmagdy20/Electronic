<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Client;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function index()
    {
        $total = 0;
        $products = Product::count();
        $category = Category::count();
        $orders = Order::count();
        $client = Client::count();
        $sumMoney = Order::get('total');
        foreach($sumMoney as $s)
        {
            $total+=$s->total;
        }
        return view('admins.index',compact('products','category','orders','client','total'));
    }
}

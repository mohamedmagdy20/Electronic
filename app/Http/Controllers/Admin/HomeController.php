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
        $products = Product::count();
        $category = Category::count();
        $orders = Order::count();
        $client = Client::count();
        return view('admins.index',compact('products','category','orders','client'));
    }
}

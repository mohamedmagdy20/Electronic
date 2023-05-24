<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function index()
    {
        $cats = Category::with('product')->get();
        $products = Product::latest()->take(6);
        return view('user.index',compact('cats','products'));
    }
}

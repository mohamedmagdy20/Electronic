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
        $products = Product::with('images')->latest()->take(6)->get();
        return view('user.index',compact('products'));
    }

    public function showAllProduct(Request $request)
    {
        $products = Product::with('images')->with('category');
        if($request->from && $request->to)
        {
            $products =$products->whereBetween('priceOut',[$request->from ,$request->to]);
        }
        $products = $products->paginate(10);
        return view('user.showproducts',compact('products'));
    }


    public function productCategory(Request $request,$id)
    {
        $products = Product::with('images')->with('category');
        if($request->from && $request->to)
        {
            $products = $products->whereBetween('priceOut',[$request->from ,$request->to]);
        }
        $products = $products->where('category_id',$id)->latest()->paginate(10);
        return view('user.category',compact('products'));

    }

    public function newProducts(Request $request)
    {
        $products = Product::with('images')->with('category');
        if($request->from && $request->to)
        {
            $products =$products->whereBetween('priceOut',[$request->from ,$request->to]);
        }
        $products = $products->latest()->paginate(10);
        return view('user.showproducts',compact('products'));
    }

    public function SearchProducts(Request $request)
    {
        $products = Product::with('images')->with('category')->where('name','LIKE', '%'.$request->name.'%')->paginate(10);     
        return view('user.showproducts',compact('products'));
    }

    public function showProduct($id)
    {
        $product = Product::with('images')->with('category')->findOrFail($id);
        return view('user.product',compact('product'));

    }

}

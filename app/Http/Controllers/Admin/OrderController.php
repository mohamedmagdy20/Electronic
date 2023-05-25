<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends BaseController
{
    //
    protected $view ='orders.';

    public function __construct(Order $model)
    {
        parent::__construct($model);
    }

    public function index()
    {
        $data = $this->model->with(['order_details'=>function($q){
            $q->with('product');
        }])->get();
        return view('admins.orders.index',compact('data'));
    }

    public function approveOrder($id)
    {
        $data = $this->showData($id);
        $data->update(['status'=>'recived']);
        return redirect()->back()->with('success','Order Approved');
    }

    public function cencelOrder($id)
    {
        $data = $this->showData($id);
        $data->update(['status'=>'cencel']);
        return redirect()->back()->with('success','Order Cenceled');
    }

    public function showOrder($id)
    {
        $data = Order::with(['order_details'=>function($q){
            $q->with('product');
        }])->with('client')->findOrFail($id); 
        // return $data;
       
        return view('admins.orders.reservation',compact('data'));
    }

}

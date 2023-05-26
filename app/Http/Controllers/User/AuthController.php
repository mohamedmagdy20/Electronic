<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\Client;
use App\Models\Order;
use App\Models\OrderDetails;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends BaseController
{
    //
    public function __construct(Client $model)
    {
        parent::__construct($model);
    }
    public function registerView()
    {
        return view('user.auth.register');
    }

    public function register(RegisterRequest $request)
    {
        $data = $request->validated();

        if($request->file('img'))
        {
            $data['img']  = $this->storeImage($data['img'],config('path.CLIENT_PATH'));
        }
        $data['password'] = Hash::make($data['password']);
        $this->model->create($data);
        return redirect()->route('login')->with('Your Account Has Been Added Please Make Login');
    }

    public function loginView()
    {
        return view('user.auth.login');
    }

    public function login(LoginRequest $request)
    {
        $request->validated();
        if($request->authenticate())
        {
            return redirect()->route('home')->with('success','Welcome');
        }else{
            return redirect()->back()->with('error','Invaild Email or Password');
        }
    }

    public function destroy()
    {
        auth('client')->logout();
        return redirect()->route('home');
    }
    
    public function profile()
    {
        $data = OrderDetails::with(['order'=>function($q){
            return $q->where('client_id',auth('client')->user()->id);
        }])->with(['product'=>function($d){
            $d->with('images');
        }])->get();
        // return $data;
        return view('user.profile',compact('data'));
    }
}

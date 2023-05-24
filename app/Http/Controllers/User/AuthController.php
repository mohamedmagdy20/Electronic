<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\Client;
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
        return view('user.auth.login');
    }

    public function register(RegisterRequest $request)
    {
        $data = $request->validated();

        if($request->file('img'))
        {
            $data['img']  = $this->storeImage($request->file('img'),config('path.CLIENT_PATH'));
        }
        $data['password'] = Hash::make($data['password']);
        return $this->model->create($data);
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
        return redirect()->route('admin.login.view');
    }

    
}

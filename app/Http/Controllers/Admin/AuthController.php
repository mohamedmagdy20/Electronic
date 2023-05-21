<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Auth\LoginRequest;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends BaseController
{
    //
    protected $view = 'auth.'; 
    public function __construct(Client $model)
    {
        parent::__construct($model);      
    }

    public function index()
    {
        return view($this->adminView($this->view.'login'));
    }

    public function store(LoginRequest $request)
    {
        $request->validated();
        if($request->authenticate())
        {
            return redirect()->route('admin.index')->with('success','Welcome');
        }else{
            return redirect()->back()->with('error','Invaild Email or Password');
        }
    
    }

    public function destroy()
    {
        Auth::logout();
        return redirect()->route('admin.login.view');
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreAdmin;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends BaseController
{
    //
    protected $view ='admins.';

    public function __construct(User $model)
    {
        parent::__construct($model);
    }

    public function index()
    {
        $admins = $this->getAll();
        return view('admins.admin.index',compact('admins'));
    }

    public function create()
    {
        return view('admins.admin.create');
    }

    public function edit($id)
    {
        $data = $this->showData($id);
        return view('admins.admin.edit',['data'=>$data]);
    }

    public function store(StoreAdmin $request)
    {
        $data = $request->validated();
        if($request->file('img'))
        {
            $data['img'] = $this->storeImage($request->file('img'),config('path.USER_PATH'));
        }
        $this->model->create($data);

        return redirect()->back()->with('success','User Added');
    }


    public function update(StoreAdmin $request,$id)
    {
        $data = $request->validated();
        $admin = $this->showData($id);
        if($request->file('img'))
        {
            $data['img'] = $this->updateImage($request->file('img'),$admin->img,config('path.USER_PATH'));
        }
        $admin->update($data);
        return redirect()->route('admins.index')->with('success','Admin Added');

    }

    public function delete($id)
    {
        $data = $this->showData($id);
        $this->updateImage(null,$data->img,config('path.USER_PATH'));
        $data->delete();
        return redirect()->back()->with('success','User Deleted');
    }
    
}

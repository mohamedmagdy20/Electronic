<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Category\CategoryRequests;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends BaseController
{
    //
    protected $view ='category.';

    public function __construct(Category $model)
    {
        parent::__construct($model);
    }

    public function index()
    {
        $data = $this->getAll();
        return view('admins.category.index',compact('data'));
    }

    public function create()
    {
        return view('admins.category.create');
    }

    public function edit($id)
    {
        $data = $this->showData($id);
        return view('admins.category.edit',['data'=>$data]);
    }

    public function store(CategoryRequests $request)
    {
        $data = $request->validated();
        if($request->file('img'))
        {
            $data['img'] = $this->storeImage($request->file('img'),config('path.CATEGORY_PATH'));
        }
        $this->model->create($data);

        return redirect()->back()->with('success','Added');
    }


    public function update(CategoryRequests $request,$id)
    {
        $data = $request->validated();
        $admin = $this->showData($id);
        if($request->file('img'))
        {
            $data['img'] = $this->updateImage($request->file('img'),$admin->img,config('path.CATEGORY_PATH'));
        }
        $admin->update($data);
        return redirect()->route('admins.index')->with('success','Upadated');

    }

    public function delete($id)
    {
        $data = $this->showData($id);
        $this->updateImage(null,$data->img,config('path.CATEGORY_PATH'));
        $data->delete();
        return redirect()->back()->with('success',' Deleted');
    }

}

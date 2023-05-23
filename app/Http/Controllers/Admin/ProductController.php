<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Product\ProductRequest;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Http\Request;

class ProductController extends BaseController
{
    //
    protected $view ='products.';

    public function __construct(Product $model)
    {
        parent::__construct($model);
    }

    public function index()
    {
        $admins = $this->getAll();
        return view($this->adminView($this->view.'index'),compact('admins'));
    }

    public function create()
    {
        $cats = Category::all();
        return view($this->adminView($this->view.'create'),['cats'=>$cats]);
    }

    public function edit($id)
    {
        $data = $this->showData($id);
        return view($this->adminView($this->view.'edit'),['data'=>$data]);
    }

    public function store(ProductRequest $request)
    {
        $data = $request->validated();
        
        $product =  $this->model->create($data);

        $productImage = new ProductImage;
        if($request->images)
        {
            foreach($data['images'] as $img)
            {
                $productImg = $this->storeImage($img,config('path.PRODUCT_PATH'));
                $productImage->create([
                    'img'=>$productImg,
                    'product_id'=>$product->id
                ]);
            }
        }

        return redirect()->back()->with('success','Product Added');
    }


    public function update(ProductRequest $request,$id)
    {
        $data = $request->validated();
        $product = $this->showData($id);
        if($request->file('images'))
        {
            $productImages = ProductImage::where('product_id',$product->id)->delete();
            
            foreach($data['images'] as $img)
            {
                $productImg = $this->storeImage($img,config('path.PRODUCT_PATH'));
                ProductImage::create([
                    'img'=>$productImg,
                    'product_id'=>$product->id
                ]);
            }
        }
        $product->update($data);
        return redirect()->route('admins.index')->with('success','Admin Added');

    }

    public function delete($id)
    {
        $data = $this->showData($id);
        // $this->updateImage(null,$data->img,config('path.USER_PATH'));
        $data->delete();
        return redirect()->back()->with('success','Product Deleted');
    }


}

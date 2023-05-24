<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class BaseController extends Controller
{
    //
    protected $baseWebsite = 'client.';
    protected $baseAdmin = 'admins.';


    protected $model;    
    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    protected function adminView($view)
    {
        return $this->baseAdmin . $view;
    }
    protected function websiteView($view)
    {
        return $this->baseWebsite . $view;
    }
    protected function getAll()
    {
        return  $this->model->query()->get();
    }

    protected function showData($id)
    {
        return $this->model->findOrFail($id);        
    }

    protected function admin()
    {
        return auth()->user();
    }

    protected function client()
    {
        return auth('client')->user();
    }

    protected function storeImage($image , $filePath)
    {
        $imageName = time().$image->getClientOriginalName().'.'.$image->extension();  
        $path = $image->move(public_path($filePath), $imageName);
        return $imageName;    
    }   

    protected function updateImage($newImage = null,$oldImage,$path)
    {
        if($oldImage)
        {
            unlink($path.'/'.$oldImage);
        }
        if($newImage != null)
        {
          return $this->storeImage($newImage,public_path($path));
        }
    }


}
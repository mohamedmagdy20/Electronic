<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends BaseController
{
    protected $view ='clients.';

    public function __construct(Client $model)
    {
        parent::__construct($model);
    }

    public function index()
    {
        $data = $this->getAll();
        return view('admins.clients.index',compact('data'));
    }

    public function delete($id)
    {
        $data = $this->showData($id);
        $data->delete();
        return redirect()->back()->with('success','deleted');
    }

}

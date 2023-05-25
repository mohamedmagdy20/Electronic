<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    //
    public function index()
    {
        $data = Message::all();
        return view('admins.message.index',compact('data'));
    }

    public function delete($id)
    {
        Message::find($id)->delete();
        return redirect()->back()->with('success','Deleted');
    }

    public function store(Request $request)
    {
        $request->validate([
            'message'=>'required'
        ]);
        Message::create($request->all());
        return redirect()->back()->with('success','Message Sent');
    }

}

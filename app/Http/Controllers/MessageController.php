<?php

namespace App\Http\Controllers;

use App\Models\MessageModel;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function create(Request $request){
        $validation = $request->validate([
            'name'=>"required",
            'email'=>'required',
            'number'=>'required',
            'message'=>'required',
            'image'=>'sometimes'
        ]);
        if($request->has('image')) {
            $validation['image'] = $request->file('image')->store('uploads', 'public');
        }
        MessageModel::create($validation);
        return redirect(route('contacts'))->with('success','Ваше сообщение было отправлено');
    }
    public function show(){
        $messages = MessageModel::all();
        return view('admin.messages', compact('messages'));
    }
}

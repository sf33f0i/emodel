<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    public function show(){
        $banners = Banner::all();
        return view('admin.banners', compact('banners'));
    }
    public function create(Request $request){
        $validation= $request->validate([
            'big_text'=>'required',
            'medium_text'=>'required',
            'button_text'=>'required',
            'button_href'=>'sometimes',
            'image'=>'required',

        ]);
        if($validation['button_href']==''){
            $validation['button_href']='catalog';
        }
        $validation['image']=$request->file('image')->store('banners', 'public');

        Banner::create($validation);
        return redirect(route('banners'))->with('success', 'Баннер был успешно добавлен');
    }
    public function update(Request $request, Banner $id){
        $validation = $request->validate([
            'big_text'=>'sometimes',
            'medium_text'=>'sometimes',
            'button_text'=>'sometimes',
            'button_href'=>'sometimes',
            'image'=>'sometimes',
        ]);
        if($validation['button_href']==''){
            $validation['button_href']='catalog';
        }
        if (array_key_exists('image', $validation)) {
            $validation['image'] = $request->file('image')->store('banners', 'public');
        }
        $id->update($validation);
        return redirect(route('banners'));
    }
    public function delete(Banner $id){
        $id->delete();
        return redirect(route('banners'));
    }
}

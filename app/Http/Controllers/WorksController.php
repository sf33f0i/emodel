<?php

namespace App\Http\Controllers;

use App\Models\Works;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class WorksController extends Controller
{
    public function create(Request $request){
        $validation = $request->validate([
            'image'=>'required',
            'option'=>'required'
        ]);
        $validation['image']= $request->file('image')->store('uploads', 'public');

        Works::create($validation);
        return redirect(route('works'));
    }
    public function delete(Works $id){
        Storage::delete('public/'.$id->image);
        $id->delete();

        return redirect(route('works'));
    }
}

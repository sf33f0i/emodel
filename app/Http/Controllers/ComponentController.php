<?php

namespace App\Http\Controllers;

use App\Models\Components;
use Illuminate\Http\Request;

class ComponentController extends Controller
{
    public function show()
    {
        $components = Components::all();
        return view('admin__components', compact('components'));
    }

    public function create(Request $request)
    {
        $validation = $request-> validate([
            'name'=>'required',
            'materials' => 'required'
        ]);
        Components::create($validation);
        return redirect(route('admin_components_all'))->with('success', 'Компонент был успешно добавлен');
    }
    public function delete(Components $id){
        $id->delete();
        return redirect(route('admin_components_all'));
    }
    public function edit(Request $request,Components $id){
        $validation= $request->validate([
            'name'=>'sometimes|min:1',
            'materials'=>'sometimes|min:1'
        ]);
        $id->update($validation);
        return redirect(route('admin_components_all'));
    }
}

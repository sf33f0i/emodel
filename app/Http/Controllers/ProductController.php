<?php

namespace App\Http\Controllers;

use App\Models\Components;
use App\Models\ImageProduct;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function create(ProductRequest $request)
    {
        $arr = $request->toArray();
        unset($arr['_token']);
        $arr['image'] = $request->file('image')->store('products', 'public');
        $product = Product::create($arr);

        return redirect(route('adminProducts_all'))->with('success', 'Продукт был успешно добавлен');
    }

    public function show(Request $request)
    {
        $components = Components::all();
        $productHas = Product::has('components')->get();
        $products = Product::all();
        return view('adminProduct', compact('products', 'components', 'productHas'));
    }

    public function update(Request $request, Product $id)
    {
        $validation = $request->validate([
            'name' => 'sometimes',
            'price' => 'sometimes',
            'type' => 'sometimes',
            'width' => 'sometimes',
            'discount' => 'sometimes',
            'height' => 'sometimes',
            'image' => 'sometimes',
        ]);
        if (array_key_exists('image', $validation)) {
            $validation['image'] = $request->file('image')->store('products', 'public');
        }
        $id->update($validation);
        return redirect(route('adminProducts_all'))->with('success', "Продукт успешно изменен!");
    }

    public function delete(Product $id)
    {
        $id->delete();
        return redirect(route('adminProducts_all'))->with('danger', 'Удаление произведено успешно!');
    }

    public function attach(Request $request, Product $id)
    {
        $has = Product::whereHas('components', function (Builder $query) use ($request, $id) {
            $query->where('products.id', '=', $id->id)->where('components.id', '=', $request->component);
        })->get();
        if ($has->isEmpty()) {
            $id->components()->attach($request->component);
            return redirect(route('adminProducts_all'))->with('success', 'Связь была успешно добавлена');
        } else {
            return redirect(route('adminProducts_all'))->with('danger', 'Данный вид связи уже сущестует');
        }
    }

    public function image_add(Request $request, Product $id)
    {
        if ($request->has('images')) {
            $images = $request->file('images')->store('products', 'public');

                ImageProduct::create([
                    'name' => 'Вариант ',
                    'number'=> $request->number,
                    'image' => $images,
                    'product_id' => $id->id,
                    'type' => 1
                ]);
        }
        if ($request->has('scheme')) {
                $images = $request->file('scheme')->store('products', 'public');

                ImageProduct::create([
                    'name' => "Схема",
                    'image' => $images,
                    'product_id' => $id->id,
                    'type' => 0
                ]);
        }
        if ($request->has('addendum')) {
            foreach ($request->file('addendum') as $image) {
                $images = $image->store('products', 'public');

                ImageProduct::create([
                    'name' => 'Доп. изображение',
                    'image' => $images,
                    'product_id' => $id->id,
                    'type' => 2
                ]);
            }
        }
        return redirect(route('adminProducts_all'));

    }

    public function image_delete(Request $request, ImageProduct $id)
    {
        Storage::delete('public/'.$id->image);
        $id->delete();
        return redirect(route('adminProducts_all'));

    }

    public function detach(Request $request, Product $id)
    {
        $id->components()->detach($request->componentId);
        return redirect(route('adminProducts_all'));

    }

    public function card(Product $product)
    {
        return view('user.product_card', compact('product'));
    }

}

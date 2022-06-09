<?php

namespace App\Http\Controllers;

use App\Models\Components;
use App\Models\ImageProduct;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;
use Illuminate\Database\Eloquent\Builder;

class ProductController extends Controller
{
    public function create(ProductRequest $request)
    {
        $arr = $request->toArray();
        unset($arr['_token']);
        $arr['image'] = $request->file('image')->store('uploads', 'public');
        $product = Product::create($arr);
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $images = $image->store('uploads', 'public');

                ImageProduct::create([
                    'image' => $images,
                    'product_id' => $product->id,
                ]);
            }
        }
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
            $validation['image'] = $request->file('image')->store('uploads', 'public');
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
        foreach ($request->file('images') as $image) {
            $images = $image->store('uploads', 'public');

            ImageProduct::create([
                'image' => $images,
                'product_id' => $id->id,
            ]);
        }
        return redirect(route('adminProducts_all'));

    }

    public function image_delete(Request $request, ImageProduct $id)
    {
        $id-> delete();
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

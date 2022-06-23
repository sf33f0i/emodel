<?php

namespace App\Http\Controllers;

use App\Models\Basket;
use App\Models\Product;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class BasketController extends Controller
{
    public function show()
    {
        $basket = Basket::getBasket();
        return view('user.basket', compact('basket'));
    }

    public function add(Request $request ,$product_id)
    {
        Basket::add($product_id, $request);
        return redirect(route('catalog'));
    }

    public function add_count(Basket $id)
    {
        $id->quantity++;
        $id->save();
        return redirect(route('basket'));
    }

    public function minus_count(Basket $id)
    {
        if ($id->quantity <= 1) {
            $id->delete();
        } else {
            $id->quantity--;
            $id->save();
        }
        return redirect(route('basket'));
    }
    public function delete(Basket $id){
        $id->delete();
        return redirect(route('basket'));
    }
}

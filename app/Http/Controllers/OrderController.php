<?php

namespace App\Http\Controllers;

use App\Filters\OrderFilter;
use App\Models\Basket;
use App\Models\Components;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function create(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required',
            'surname' => 'required',
            'country' => 'required',
            'address' => 'required',
            'city' => 'required',
            'region' => 'required',
            'index' => 'required',
            'phone' => 'required',
            'email' => 'required|unique:orders',
            'details' => 'sometimes'
        ]);
        $validate['amount'] = Basket::order_price();
        $basket = Basket::getBasket();
        $order = Order::create($validate);
        foreach ($basket as $product) {
            $order->products_order()->create([
                'product_id' => $product->product_card->id,
                'quantity' => $product->quantity,
            ]);
        }
        $request->flash();
        return redirect(route('send_mail', $order->id));
    }

    public function index(OrderFilter $filter)
    {
        $orders = Order::query()->filter($filter)->get();
        return view('admin.orders', compact('orders'));
    }

    public function order_card(Order $order)
    {
        return view('admin.order_card', compact('order'));
    }

    public function update_status(Request $request, Order $id)
    {
        $id->status = $request->radio;
        $id->save();
        return redirect(route('order_card', $id));
    }

    public function query(Request $request)
    {
        $data = $request->all();
        $query = $data['query'];
        $filter2 = Product::select('name')
            ->where('name', 'LIKE', '%' . $query . '%')
            ->get();
        return response()->json($filter2);
    }

    public function success(Request $request)
    {
        if ($request->session()->exists('order_id')) {
            Basket::query()->where(['session_id' => session()->getId()])->get()->map(function ($index){
                $index->delete();
            });
            $order_id = $request->session()->pull('order_id');
            $order = Order::findOrFail($order_id);
            return view('user.done_order', compact('order'));
        } else {
            return redirect(route('catalog'));
        }
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class StatisticsController extends Controller
{
    public function show(){
        $orders = Order::all()->count();
        $sum_price = Order::all()->map(function ($item){
            return $item->amount;
        })->sum();
        $avg_price = Order::all()->map(function ($item){
            return $item->amount;
        })->average();
        $wait = Order::where('status', '=', 0)->count();
        $process = Order::where('status', '=', 1)->count();
        $dostavka = Order::where('status', '=', 2)->count();
        $done = Order::where('status', '=', 3)->count();
        $avg_price = round($avg_price);
        $products = Product::all()->count();
        return view('admin.statistics', compact('orders', 'avg_price','products', 'sum_price', 'done', 'wait','process', 'dostavka'));
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Basket extends Model
{
    use HasFactory;

    protected $table = 'basket';
    protected $fillable = [
        'session_id',
        'product_id',
        'price',
        'quantity',
    ];

    public function add($product_id)
    {
        $product = Product::findOrFail($product_id);

        if ($basket = self::where(["session_id" => session()->getId(), 'product_id' => $product->id])->first()) {
            $basket->quantity++;
            $basket->save();
        } else {
            if (isset($product->discount)) {
                $product->price = $product->discount;
            }
            $basket = self::create([
                'session_id' => session()->getId(),
                'product_id' => $product->id,
                'quantity' => 1,
                'price' => $product->price,
            ]);
        }
        return $basket;
    }

    public function count()
    {
        return self::where(['session_id' => session()->getId()])->sum('quantity');
    }

    public function getBasket()
    {
        return self::query()->where(['session_id' => session()->getId()])->get();
    }

    public function total_price()
    {
        $total_price = self::where(['session_id' => session()->getId()])->get()->map(function ($item) {
            return $item->price * $item->quantity;
        })->sum();
        return number_format($total_price, 0, ',', ' ');
    }

    public function order_price()
    {
        $total_price = self::where(['session_id' => session()->getId()])->get()->map(function ($item) {
            return $item->price * $item->quantity;
        })->sum();
        return $total_price;
    }

    public function econom()
    {
        $basket = self::getBasket();
        $sum = self::where('session_id', '=', session()->getId())
        ->get()->map(function ($item){
            return $item->product_card->price * $item->quantity;
        })->sum();
        return $sum - self::order_price();

    }

    public function product_card()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}

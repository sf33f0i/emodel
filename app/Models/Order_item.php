<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order_item extends Model
{
    use HasFactory;
    protected $table = 'orders_item';
    protected $fillable = [
        'product_id',
        'order_id',
        'quantity',
        'option',
    ];
    public function product(){
        return $this->belongsTo(Product::class, 'product_id');
    }
}

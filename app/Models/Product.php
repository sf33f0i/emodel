<?php

namespace App\Models;

use App\Filters\QueryFilter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Nicolaslopezj\Searchable\SearchableTrait;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';
    protected $fillable = [
        'name',
        'price',
        'type',
        'width',
        'height',
        'discount',
        'image'
    ];

    public function sale($price, $discount)
    {
        $sale = ($discount * 100) / $price;
        $sale = 100 - $sale;
        return round($sale);
    }

    public function basket()
    {
        return $this->hasMany(Basket::class, 'product_id');
    }

    public function components()
    {
        return $this->belongsToMany(Components::class, 'product_component', 'product_id', 'component_id');
    }

    public function images()
    {
        return $this->hasMany(ImageProduct::class, 'product_id');
    }

    public function scopeFilter(Builder $builder, QueryFilter $filter)
    {
        return $filter->apply($builder);
    }
}

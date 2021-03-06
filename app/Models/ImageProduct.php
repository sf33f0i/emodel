<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImageProduct extends Model
{
    use HasFactory;
    protected $table = 'images_product';
    protected $fillable = [
        'number',
        'image',
        'product_id',
        'type',
        'name',
    ];

    public $timestamps = false;

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    use HasFactory;
    protected $table = 'banners';
    protected $fillable = [
        'big_text',
        'medium_text',
        'button_text',
        'button_href',
        'image'
    ];
    protected $attributes = [
        'button_href'=>'catalog'
    ];
}

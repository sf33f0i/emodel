<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Components extends Model
{
    use HasFactory;
    protected $table = 'components';
    protected $fillable = [
        'name',
        'materials'
    ];
    public function products(){
        return $this->belongsToMany(Product::class, 'product_component', 'product_id', 'component_id');
    }
}

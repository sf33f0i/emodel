<?php

namespace App\Models;

use App\Filters\QueryFilter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = 'orders';
    protected $fillable = [
        'name',
        'surname',
        'country',
        'address',
        'city',
        'region',
        'index',
        'phone',
        'email',
        'details',
        'amount'
    ];
    public function products_order(){
        return $this->hasMany(Order_item::class, 'order_id' );
    }
    public function scopeFilter(Builder $builder, QueryFilter $filter){
        return $filter->apply($builder);
    }
    public function filter_add($name, $param)
    {
        $url = url()->current();
        $params = request()->query();
        if(array_key_exists($name, $params)){
            unset($params[$name]);
        }
        if ($params) {
            $url.='?';
            $i=0;
            foreach ($params as $key => $value){
                if($i!=0){
                    $url.='&';
                }
                $url .= "$key=$value";
                $i++;
            }
            $url .= "&$name=$param";
        } else {
            $url .= "?$name=$param";
        }
        return $url;
    }
    public function order_mail($id){
        return self::where('id', '=', $id)->get();
    }
}

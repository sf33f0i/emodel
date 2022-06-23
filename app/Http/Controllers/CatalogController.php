<?php

namespace App\Http\Controllers;

use App\Filters\ProductFilter;
use App\Models\Components;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Console\Input\Input;
use function GuzzleHttp\Promise\all;
use function PHPUnit\Framework\isEmpty;

class CatalogController extends Controller
{
    public function index(ProductFilter $filter, Request $request){
        $products=Product::query()->filter($filter)->get();
        $floor= Components::query()->where('name','=','Пол')->get();
        $insulation= Components::query()->where('name','=','Утепление')->get();
        $width= Product::query()->pluck('width')->unique();
        $height = Product::query()->pluck('height')->unique();
        $types = Product::query()->pluck('type')->unique();
        return view('user.catalog', compact('products','floor','insulation','width','height','types'));
    }
    public function query(Request $request){
        $data = $request->all();
        $query = $data['query'];
        $filter_data = Components::select('materials as name')
           ->where('materials', 'LIKE', '%'.$query.'%')
            ->get();

        $filter2 = Product::select('name')
            ->where('name', 'LIKE', '%'.$query.'%')
            ->get();
        $arr= $filter2->merge($filter_data);
        return response()->json($arr);
    }
}

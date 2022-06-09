@extends('layout_client.layout2')
<?php
use App\Models\Product;
use Illuminate\Database\Eloquent\Builder;

function count_component($component, $products)
{
    $arr=[];
    foreach ($products as $product){
        $arr[]=$product->id;
    }
    $count = Product::whereHas('components', function (Builder $query) use ($component, $arr) {
        $query->where('components.materials', '=', $component->materials)->whereIn('products.id', $arr);
    })->count();
    return $count;
}
function count_product($width, $name_param,$products)
{
    $count = $products->where($name_param, '=', $width)->count();
    return $count;
}
?>
@section('content')
    <div class="container_catalog">
        <div class="filter">
            <div class="filter_content">
                <div class="filter_text">
                    <span class="filter_component_name">{{$floor[0]->name}}</span>
                    @foreach($floor as $component)
                        <a href="{{\App\Models\Order::filter_add('materials', $component->id)}}" class="filter_components"
                           @if(isset($_GET['materials'])) @if($_GET['materials']==$component->id) style="color: red" @endif @endif>
                            {{$component->materials}}
                            ({{count_component($component, $products)}})
                        </a>
                    @endforeach
                </div>
                <div class="filter_text">
                    <span class="filter_component_name">{{$insulation[0]->name}}</span>
                    @foreach($insulation as $component)
                        <a href="{{\App\Models\Order::filter_add('materials2', $component->id)}}" class="filter_components"
                           @if(isset($_GET['materials2'])) @if($_GET['materials2']==$component->id) style="color: red" @endif @endif>
                            {{$component->materials}}
                            ({{count_component($component, $products)}})
                        </a>
                    @endforeach
                </div>
                <div class="filter_text">
                    <span class="filter_component_name">Длина</span>
                    @foreach($width as $widthes)
                        <a href="{{\App\Models\Order::filter_add('width', $widthes)}}" class="filter_components"
                           @if(isset($_GET['width'])) @if($_GET['width']==$widthes) style="color: red" @endif @endif>{{$widthes}}
                            ({{count_product($widthes, 'width',$products)}})
                        </a>
                    @endforeach
                </div>
                <div class="filter_text">
                    <span class="filter_component_name">Ширина</span>
                    @foreach($height as $visota)
                        <a href="{{\App\Models\Order::filter_add('height', $visota)}}" class="filter_components"
                           @if(isset($_GET['height'])) @if($_GET['height']==$visota) style="color: red" @endif @endif>{{$visota}}
                            ({{count_product($visota, 'height',$products)}})
                        </a>
                    @endforeach
                </div>
                <div class="filter_text">
                    <a class="clear_filter" href="{{route('catalog')}}">Сбросить</a>
                </div>
                <div style="width: 100%; height: 30px">
                </div>
            </div>
        </div>
        <div class="search_and_sort">
            <div class="search1">
                <form class="search">
                    <input class="input_search typeahead" name="query" type="text" placeholder="Введите наименование товара">
                    <button style="border: none; background: none" type="submit"><img src="{{url('/storage/homepage/lupa.png')}}" width="25px" height="25px"
                                 style="margin-right: 13px"></button>
                </form>
                <select class="select_catalog" onchange="window.location.href = this.options[this.selectedIndex].value">
                    <option value="{{\App\Models\Order::filter_add('sort', 'id')}}">По популярности</option>
                    <option value="{{\App\Models\Order::filter_add('sort', 'price')}}" @if(isset($_GET['sort'])) @if($_GET['sort']== 'price') selected @endif @endif >По цене(возрастание)</option>
                    <option value="{{\App\Models\Order::filter_add('sort', 'price2')}}" @if(isset($_GET['sort'])) @if($_GET['sort']== 'price2') selected @endif @endif >По цене(убывание)</option>
                    <option value="{{\App\Models\Order::filter_add('sort', 'width')}}" @if(isset($_GET['sort'])) @if($_GET['sort']== 'width') selected @endif @endif>По ширине</option>
                    <option value="{{\App\Models\Order::filter_add('sort', 'height')}}" @if(isset($_GET['sort'])) @if($_GET['sort']== 'height') selected @endif @endif >По длинне</option>
                </select>
            </div>
            <div class="catalog_products">
                @foreach($products as $product)
                    <a href="{{route('card',  $product)}}" class="product_card_catalog" style="text-decoration: none">
                        <img class="image_card_product" src="{{url('/storage/'.$product->image)}}">
                            <div class="card_info">
                                <div class="card_name_size">
                                    <span class="name_product">{{$product->name}}</span>
                                    <span class="size_product">Размер: {{$product->width}}×{{$product->height}}</span>
                                </div>
                                <div class="price_and_button">
                                    @if(isset($product->discount))
                                        <span class="sale">Персональная скидка!</span>
                                    @else
                                        <span class="sale"></span>
                                    @endif
                                    <div class="price_butt_content">
                                        <div class="price">
                                            @if(isset($product->discount))
                                                <span class="old_price"> {{$product->price}} ₽</span>
                                                <span class="new_price"> {{$product->discount}} ₽</span>
                                            @else
                                                <span class="new_price">{{$product->price}} ₽</span>
                                            @endif
                                        </div>
                                        <form method="POST" action="{{route('add_basket', $product->id)}}">
                                            @csrf
                                            <button type="submit" class="in_basket">В корзину</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                    </a>
                @endforeach
            </div>
        </div>
    </div>
    <footer class="footer_catalog">

    </footer>
    @include('user.typehead')
@endsection

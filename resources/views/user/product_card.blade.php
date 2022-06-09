@extends('layout_client.layout2')
@section('content')
    <div class="card_body">
        <div class="card_content">
            <div class="card_info2">
                <img src="{{url('/storage/'.$product->image)}}" style="width: initial; max-width: 100%">
                <div class="addon_image">
                    @foreach($product -> images as $image)
                        <a data-fancybox="gallery"
                             data-caption="{{$product->name}}" class="grouped_elements" rel="group1" href="{{url('/storage/'.$image->image)}}">
                            <img src="{{url('/storage/'.$image->image)}}" width="200px"  alt=""/>
                        </a>
                    @endforeach
                </div>
            </div>
            <div class="card_info2">
                <div class="name_price_card">
                    <div class="card_names">
                        <span style="font-size: 48px; font-family:'MontserratSemiBold',serif; ">{{$product->name}}</span>
                        <span style="font-size: 20px;font-family:'MontserratMedium',serif; color: #848484">Параметры: {{$product->width}}x{{$product->height}}</span>
                    </div>
                    <div class="price_and_button_in_basket">
                        <div class="price_card_product">
                            @if(isset($product->discount))
                                <div class="sale_container">
                                    <span class="price_discount_sale">{{number_format($product->discount, 0, ',', ' ')}} ₽</span>
                                    <div class="sale_content">
                                        <span>{{\App\Models\Product::sale($product->price, $product->discount)}} %</span>
                                    </div>
                                </div>
                                <span class="sale"> Персональная скидка!</span>
                                <span class="discount_card_product">
                                    {{number_format($product->price, 0, ',', ' ')}} ₽
                                </span>
                            @else
                                <span class="price_discount_sale">{{number_format($product->price, 0, ',', ' ')}} ₽</span>
                            @endif
                        </div>
                    </div>
                    <div style="width: 100%; display: flex;justify-content: flex-end">
                        <form method="POST" action="{{route('add_basket', $product->id)}}">
                            @csrf
                            <button type="submit" class="button_card_product">
                                В корзину
                            </button>
                        </form>
                    </div>
                    <div class="components_product_container">
                        <span style="font-family: 'MontserratSemiBold', serif;"> Детальная информация: </span>
                        @foreach($product->components as $component )
                            <span class="components_product_container_text"> {{$component->name}}: {{$component->materials}} </span>
                        @endforeach
                        <div style="width: 100%; height: 25px"></div>
                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection

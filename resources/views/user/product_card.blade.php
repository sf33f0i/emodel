@extends('layout_client.layout2')
@section('content')
    <div class="card_body">
        <div class="card_content">
            <div class="card_info2">
                <img src="{{url('/storage/'.$product->image)}}" style="width: initial; max-width: 100%">
                <div class="addon_image">
                    @foreach($product -> images->where('type', '=', 0 ) as $image)
                        <div style="display: flex; flex-direction: column; align-items: center">
                        <a data-fancybox="gallery"
                           data-caption="{{$product->name}}" class="grouped_elements" rel="group1" href="{{url('/storage/'.$image->image)}}">
                            <img src="{{url('/storage/'.$image->image)}}" width="200px" height="167px"  alt=""/>
                        </a>

                        <span>{{$image -> name}}</span>
                        </div>
                    @endforeach
                    @foreach($product -> images->where('type', '=', 1 )->sortBy('number') as $image)
                        <div style="display: flex; flex-direction: column; align-items: center">
                        <a data-fancybox="gallery"
                             data-caption="{{$image->name}} {{$image->number}}" class="grouped_elements" rel="group1" href="{{url('/storage/'.$image->image)}}">
                            <img src="{{url('/storage/'.$image->image)}}" width="200px"  alt=""/>

                        </a>
                        <span>{{$image -> name}} {{$image -> number}}</span>
                        </div>
                    @endforeach
                </div>
                @if($product ->images->where('type','=', 2)->count()!=0)
                <div class="add_images">
                    <span style="font-family: 'MontserratSemiBold', serif; margin-bottom: 20px" >Дополнительные изображения:</span>
                    @foreach($product -> images->where('type', '=', 2 ) as $image)
                        <a data-fancybox="gallery"
                           data-caption="{{$product->name}}" class="grouped_elements" rel="group1" href="{{url('/storage/'.$image->image)}}">
                            <img src="{{url('/storage/'.$image->image)}}" width="200px"  alt=""/>
                        </a>
                    @endforeach
                </div>
                @endif
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
                        <form method="POST" class="form_button_add_in_basket" action="{{route('add_basket', $product->id)}}">
                            @csrf
                            <button type="submit" class="button_card_product">
                                В корзину
                            </button>
                            @if($product ->images ->where('type', '=', '1')->count()!=0)
                            <span style="display: flex;width: 100%;justify-content: flex-start;margin-top: 10px;font-family: 'MontserratSemiBold', serif;">
                                Выберите вариант:
                            </span>
                            <div class="radio_form_basket">
                            @foreach($product ->images ->where('type', '=', '1')->sortBy('number') as $image)
                                <div class="form-check" style="margin-right:15px; margin-bottom: 5px">
                                    <input class="form-check-input" type="radio" name="radio" value="{{$image->number}}" id="flexRadioDefault1" required>
                                    <label class="form-check-label" for="flexRadioDefault1">
                                        {{$image -> name}} {{$image -> number}}
                                    </label>
                                </div>
                                @endforeach
                            </div>
                            @endif
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

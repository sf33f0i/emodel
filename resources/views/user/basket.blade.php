@extends('layout_client.layout2')
@section('content')
<div class="basket_container">
    <div class="basket_content">
        <div class="title_basket">
            <span> Корзина({{\App\Models\Basket::Count()}})</span>
        </div>
        <div class="basket_table">
            @if(\App\Models\Basket::count()!=0)
                <table class="table table-light table-hover">
                    <thead>
                    <tr>
                        <th scope="col"><span style="margin-left: 30px">Продукт</span></th>
                        <th scope="col"> </th>
                        <th scope="col">Параметры</th>
                        <th scope="col">Количество</th>
                        <th scope="col">Цена</th>
                        <th scope="col"> </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($basket as $product)
                    <tr>
                        <td><img src="{{url('storage/'.$product->product_card->image)}}" width="300px"></td>
                        <td style="font-size: 24px; font-family: 'Montserrat',serif;">{{$product->product_card->name}}</td>
                        <td class="td_basket"> {{$product->product_card->width}}x{{$product->product_card->height}}</td>
                        <td class="td_basket">
                            <div class="quantity">
                                <form method="POST" action="{{route('minus_count', $product->id)}}">
                                    @csrf
                                    <button class="add_count" type="submit">-</button>
                                </form>
                                {{$product->quantity}}
                                <form method="POST" action="{{route('add_count', $product->id)}}">
                                    @csrf
                                    <button class="add_count" type="submit">+</button>
                                </form>
                            </div>
                        </td>
                        <td class="td_basket">{{number_format($product->price * $product->quantity, 0, ',', ' ')}} ₽</td>
                        <td class="td_basket">
                            <div style="width: 60px">
                                <form method="POST" action="{{route('delete_product_basket', $product->id)}}">
                                    @csrf
                                    @method("DELETE")
                                    <button style="background: none;border: none" type="submit"><img src="{{url('storage/uploads/close.svg')}}" width="30px"></button>
                                </form>
                            </div>
                        </td>

                    </tr>
                    @endforeach
                    </tbody>
                </table>
                <div style="display: flex; width: 100%;justify-content: flex-start;flex-direction: column;align-items: flex-end">
                    <h1 style="font-family: 'Montserrat',serif;">Итого: {{\App\Models\Basket::total_price()}} ₽</h1>
                    <a class="button_basket_offer" href="{{route('order')}}">Оформить заказ</a>
                </div>
            </div>
        @else
            <div style="font-size: 18px;font-family: 'Montserrat', serif"> Корзина пуста</div>
        @endif
    </div>
</div>
@endsection

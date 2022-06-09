@extends('layouts.layout')
@section('content')
    <div class="container_order_card">
        <div class="content_order_card">
            <div class="order_card">
                <div class="order_card_info">
                    <span class="title_card_order">Клиент:</span>
                    <span class="text_card_order">Имя и Фамилия: {{$order->name}} {{$order->surname}} </span>
                    <span class="text_card_order">Электронная почта: {{$order->name}} {{$order->surname}} </span>
                    <span class="text_card_order">Адрес: {{$order->country}}, {{$order->region}},{{$order->city}}</span>
                    <span class="text_card_order">Телефон: {{$order->phone}}</span>
                    <span class="text_card_order">Почтовый индекс: {{$order->index}}</span>
                </div>
            </div>
            <div class="order_card">
                <div class="order_card_info">
                    <span class="title_card_order">Заказ:</span>
                    <span class="text_card_order">ID: {{$order->id}}</span>
                    <span class="text_card_order">Стоимость заказа: {{number_format($order->amount, 0, ',', ' ')}} ₽</span>
                    <span class="text_card_order">Детали заказа: {{$order->details}}</span>
                </div>
            </div>
            <div class="order_card" style="height: fit-content">
                <div class="order_card_info">
                    <span class="title_card_order" style="margin-bottom: 26px">Статус заказа:</span>
                    <form method="POST" action="{{route('status_update', $order)}}">

                        @csrf
                        <div class="form_status_update">
                            <div class="form-check radio_form">
                                <input class="form-check-input" name="radio" type="radio" name="flexRadioDefault" value="0"  id="flexRadioDefault1" @if($order->status == 0) checked @endif>
                                <label class="form-check-label" for="flexRadioDefault1">
                                    В процессе
                                </label>
                            </div>
                            <div class="form-check radio_form">
                                <input class="form-check-input" name="radio"  type="radio" name="flexRadioDefault" value="1"  id="flexRadioDefault2" @if($order->status == 1) checked @endif>
                                <label class="form-check-label" for="flexRadioDefault2">
                                    Готово
                                </label>
                            </div>
                            <div class="form-check radio_form">
                                <input class="form-check-input" name="radio"  type="radio" name="flexRadioDefault" value="2" id="flexRadioDefault2" @if($order->status == 2) checked @endif>
                                <label class="form-check-label" for="flexRadioDefault2">
                                    На рассмотрении
                                </label>
                            </div>
                        </div>
                        <button class="btn btn-primary mt-2" type="submit">Обновить статус</button>
                    </form>
                </div>
            </div>
            <div class="order_card">
                <div class="order_card_info">
                    <span class="title_card_order">Товары:</span>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">Наименование</th>
                                <th scope="col"> </th>
                                <th scope="col">Кол-во</th>
                                <th scope="col">Стоимость</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($order->products_order as $product)
                            <tr>
                                <td>
                                    <img src="{{url('/storage/'.$product->product->image)}}" width="300px" alt="">
                                </td>
                                <td>{{$product->product->name}}</td>
                                <td>{{$product->quantity}}</td>
                                @if(isset($product->product->discount))
                                    <td>{{number_format($product->product->discount*$product->quantity, 0, ',', ' ')}} ₽</td>
                                @else
                                    <td>{{number_format($product->product->price*$product->quantity, 0, ',', ' ')}} ₽</td>
                                @endif
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div style="display: flex;width: 100%;justify-content: flex-end">
                    <span class="title_card_order" style="margin-bottom: 26px">Итого: {{number_format($order->amount, 0, ',', ' ')}} ₽</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

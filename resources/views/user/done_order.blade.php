@extends('layout_client.layout2')
@section('content')
    <div class="container_order_done">
        <div class="content_order_done">
            <img src="{{url('storage/homepage/done.png')}}">
            <div class="text_done_and_button">
                <span style="font-family: 'Montserrat',serif;font-size: 48px"> Заказ успешно оформлен!</span>
                <span style="margin-top: 26px"> Номер вашего заказа <span style="font-weight: 600">{{$order->id}}</span></span>
                <span style="margin-top: 26px;line-height: 150%;"> Информация  выслана на ваш e-mail, указаный при фофрмлении заказа</span></span>
            </div>
        </div>
    </div>
@endsection

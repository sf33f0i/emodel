@extends('layout_client.layout2')
@section('content')
    <div class="container_order_done">
        <div class="content_order_done">
            <div style="width: 100%;display: flex;justify-content: flex-start;">
                <img src="{{url('storage/uploads/logotype.png')}}" width="230px;" height="55px">
            </div>
            <div class="text_done_and_button">
                <span style="font-family: 'Montserrat',serif;font-size: 48px"> Заказ успешно оформлен!</span>
                <span style="margin-top: 26px"> Номер вашего заказа <span style="font-weight: 600"></span></span>
                <span style="margin-top: 26px;line-height: 150%;"> Информация  выслана на ваш e-mail, указаный при фофрмлении заказа</span></span>
            </div>
            <a href="{{route('home_client')}}" style="text-decoration: none;color: black;background: #FFFFFF;border: none;width: 208px;height: 50px;margin-bottom: 70px;margin-top: 50px;display: flex;justify-content: center;align-items: center;font-size: 20px;font-family: 'Montserrat',serif;">Вернуться</a>
        </div>
    </div>
@endsection

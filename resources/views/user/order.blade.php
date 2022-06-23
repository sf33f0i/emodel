@extends('layout_client.layout2')
@section('content')
    <div class="container_order_user">
        <div class="content_user_order">
            <div style="display: flex;flex-direction: column;justify-content: space-between;align-items: flex-start">
                <h1 style="font-family: 'MontserratSemiBold',serif;font-size: 36px;margin-bottom: 40px">Оформление заказа</h1>
                <form class="form_order_user needs-validation" method="POST" action="{{route('create_order')}}" novalidate>
                    @csrf
                    <div style="display: flex;flex-direction: row;align-items: center;justify-content: space-between">
                    <div class="user_information" style="margin-right: 10px;">
                        <label for="name_user">Имя<span style="color: red">*</span></label>
                        <input class="input_order_user" id="name_user" type="text" name="name" value="{{ session('name') }}" required>
                        <div class="invalid-feedback">
                            Заполните поле!
                        </div>
                    </div>
                        <div class="user_information" style="margin-left: 10px;">
                            <label for="surname">Фамилия<span style="color: red">*</span></label>
                            <input class="input_order_user" type="text" id="surname" name="surname" required>
                            <div class="invalid-feedback">
                                Заполните поле!
                            </div>
                        </div>
                    </div>
                    <div class="country">
                        <label for="name_user">Страна/регион<span style="color: red">*</span></label>
                        <input class="input_order_user" type="text" name="country" id="country" required>
                        <div class="invalid-feedback">
                            Заполните поле!
                        </div>
                    </div>
                    <div class="user_information">
                        <label for="name_user">Адрес<span style="color: red">*</span></label>
                        <input class="input_order_user" type="text" id="address" name="address" required>
                        <div class="invalid-feedback">
                            Заполните поле!
                        </div>
                    </div>
                    <div class="user_information">
                        <label for="city">Населенный пункт<span style="color: red">*</span></label>
                        <input class="input_order_user" type="text" id="city" name="city" required>
                        <div class="invalid-feedback">
                            Заполните поле!
                        </div>
                    </div>
                    <div class="user_information">
                        <label for="region">Область/район<span style="color: red">*</span></label>
                        <input class="input_order_user" type="text" id="region" name="region" required>
                        <div class="invalid-feedback">
                            Заполните поле!
                        </div>
                    </div>
                    <div class="user_information">
                        <label for="region">Почтовый индекс<span style="color: red">*</span></label>
                        <input class="input_order_user" type="text" id="index" name="index" required>
                        <div class="invalid-feedback">
                            Заполните поле!
                        </div>
                    </div>
                    <div class="user_information">
                        <label for="phone">Номер телеофна<span style="color: red">*</span></label>
                        <input class="input_order_user" type="text" id="phone" name="phone" required>
                        <div class="invalid-feedback">
                            Заполните поле!
                        </div>
                    </div>
                    <div class="user_information">
                        <label for="email">Электронная почта<span style="color: red">*</span></label>
                        <input class="input_order_user" type="text" name="email" id="email" value="{{ session('email') }}" required>
                        <div class="invalid-feedback">
                            Заполните поле!
                        </div>
                    </div>
                    <div class="user_information">
                        <label for="details">Детали</label>
                        <textarea class="input_order_user" style="resize: none;height: 150px" type="text" id="details" name="details"></textarea>
                    </div>
                    <button class="button_order_user" type="submit">Оформить заказ</button>
                    <div style="margin-top: 20px">
                    @include('inc.messages')
                    @include('inc.scripts')
                    </div>

                </form>

                <div style="height: 100px; margin-top: 60px">

                </div>
            </div>
        </div>
            <div class="your_order">
                <h1>Ваш заказ</h1>
                <div style="width: 100%;height: 1px; background-color: #1b1e21;padding: 0px"></div>
                @foreach($basket as $product)
                    <div class="your_order_product">
                        <span style="margin-right: 50px; width: 33%; display: flex;flex-direction: column">
                            {{$product->product_card->name}}
                            @if(isset($product->option))
                            <span style="font-size: 14px; font-family: 'MontserratSemiBold',serif">
                                Вариант: {{$product->option}}
                            </span>
                            @endif
                        </span>
                        <span style="margin-right: 50px; width: 33%">Кол-во: {{$product->quantity}} </span>
                        <span style="width: 33%">{{number_format($product->product_card->price * $product->quantity, 0, ',', ' ')}} ₽</span>
                    </div>
                    <div style="width: 100%;height: 1px; background-color: #d0d0d0;margin-top: 20px"></div>
                @endforeach
                <div style="width: 100%;display: flex;justify-content: center;align-items: flex-start; flex-direction: column; margin-top: 26px">
                    <div style="display: flex;flex-direction: column;justify-content: center;align-items: flex-start; width: initial">
                        <span style="font-size: 16px;font-family: 'MontserratSemiBold',serif;">Экономия: {{\App\Models\Basket::econom()}} ₽</span>
                        <h1 style="font-family: 'MontserratSemiBold',serif">Итого: {{\App\Models\Basket::total_price()}} ₽</h1>
                    </div>
                </div>
            </div>
    </div>
@endsection

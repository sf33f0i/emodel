@extends('layout_client.layout2')
@section('content')
<div class="container_contact">
    <div class="content_contact">
        <span style="font-family: 'MontserratSemiBold',serif; font-size: 32px;width: 100%;
    text-align: center;">Контактная инофрмация и доставка</span>
        <span style="font-family: 'Montserrat',serif;font-size: 14px;margin-top: 20px; margin-bottom: 20px; text-align: center;">Стоимость доставки можно уточнить по телефону +7 (982) 762-15-56 или при личной встрече по адресу: г.Екатеринбург, ул.Новостроя, 1А.<br><br>

            <b>Внимание! При получении товара, оплаченного от юридического лица, необходимо иметь доверенность или печать!</b></span>
        <script type="text/javascript" charset="utf-8" async src="https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3A8b7e77c00d380b199c56cb894516f4af31773164d12ad2459aab7b9b19eb306b&amp;width=800&amp;height=500&amp;lang=ru_RU&amp;scroll=true"></script>
    </div>
    <div class="content_contact2">
        <span style="font-family: 'MontserratSemiBold',serif; font-size: 32px; margin-bottom: 20px">Отправить сообщение</span>
        <form method="POST" action="{{route('message')}}" style="width: 50%" enctype="multipart/form-data">
            @csrf
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">@</span>
                <input type="text" class="form-control" name="name" placeholder="Имя пользователя" aria-label="Имя пользователя" aria-describedby="basic-addon1">
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">Телефон</span>
                <input type="number" name="number" class="form-control" placeholder="Телфон" aria-label="Имя пользователя" aria-describedby="basic-addon1">
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">Почта</span>
                <input type="email" name="email" class="form-control" aria-label="Имя пользователя" aria-describedby="basic-addon1">
            </div>
            <div class="input-group">
                <span class="input-group-text">Сообщение</span>
                <textarea name="message" class="form-control" aria-label="С текстовым полем"></textarea>
            </div>
            <div class="mb-3 mt-2">
                <label for="formFile" class="form-label">Изображение</label>
                <input class="form-control" name="image" type="file" id="formFile">
            </div>
            <button type="submit" name="submit" class="button_message">
                Отправить
            </button>
        </form>
        <div style="height: 20px"></div>
        @include('inc.messages')
    </div>
</div>
@endsection

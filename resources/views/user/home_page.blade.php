@extends('layout_client.layout')
@section('content')
<div class="container_slider">
    @include('user.inc.slider')
</div>
<div class="container_home_2">
    <div class="container2_content">
        <span class="onas_text">О нас</span>
        <div class="onas_info">
            <div class="brief_info">
                <div class="info_point">
                    <div class="text_info">
                        <span class="text_big_info">от 2-х дней</span>
                        <span class="text_medium_info">
                            Срок на изготовление<br>сооружения.
                        </span>
                    </div>
                </div>
                <div class="info_point">
                    <div class="text_info">
                        <span class="text_big_info">5 лет</span>
                        <span class="text_medium_info">
                            Гарантии на устранение<br>дефектов
                        </span>
                    </div>
                </div>
                <div class="info_point">
                    <div class="text_info">
                        <span class="text_big_info">более 3-х лет</span>
                        <span class="text_medium_info">
                            E-модуль находится<br>на рынке
                        </span>
                    </div>
                </div>
            </div>
            <span>
                Изготовление модульных домов, бытовок, постов охраны и других конструкций <br> в Екатеринбурге по индивидуальным размерам!
            </span>
        </div>
    </div>
</div>
<div class="category_home">
    <div class="category_home_container">
        <span class="category_home_title">Категории товаров</span>
        <div class="cards_home">
            <div class="category_home_card">
                <div class="card_container">
                    <div class="image_card">
                        <img src="{{url('/storage/uploads/category1.png')}}" width="236px">
                    </div>
                    <span class="text_big_card">Бытовки</span>
                    <span class="text_medium_card">Вспомогательное помещение используемого для бытовых нужд на предприятиях, стройках, дачных участках в качестве временного жилья, для хранения инструментов и инвентаря.</span>
                    <div class="button_card_home">
                        <a class="a_card_home" href="{{route('catalog')}}">Перейти</a>
                    </div>
                </div>
            </div>
            <div class="category_home_card">
                <div class="card_container">
                    <div class="image_card">
                        <img src="{{url('/storage/uploads/category2.png')}}" width="236px">
                    </div>
                    <span class="text_big_card">Посты охраны</span>
                    <span class="text_medium_card">Помещение используемое для нахохдения в них сотрудников охраны, специального оборудования и всех необходимых вещей.</span>
                    <div class="button_card_home">
                        <a class="a_card_home" href="{{route('catalog')}}">Перейти</a>
                    </div>
                </div>
            </div>
            <div class="category_home_card">
                <div class="card_container">
                    <div class="image_card">
                        <img src="{{url('/storage/uploads/category3.png')}}" width="236px">
                    </div>
                    <span class="text_big_card">Модульные дома</span>
                    <span class="text_medium_card">Это сборная конструкция, состоящая из отдельных секций деревянного бруса или металла, которые производятся на заводах и поставляются на место строительства в уже готовом виде</span>
                    <div class="button_card_home">
                        <a class="a_card_home" href="{{route('catalog')}}">Перейти</a>
                    </div>
                </div>
            </div>
            <div class="category_home_card">
                <div class="card_container">
                    <div class="image_card">
                        <img src="{{url('/storage/uploads/category4.png')}}" width="236px">
                    </div>
                    <span class="text_big_card">Гаражи</span>
                    <span class="text_medium_card">Это сборная конструкция, состоящая из отдельных секций деревянного бруса или металла, которые производятся на заводах и поставляются на место строительства в уже готовом виде</span>
                    <div class="button_card_home">
                        <a class="a_card_home" href="{{route('catalog')}}">Перейти</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container_home_img">
    <div class="container_img">
        <img src="{{url('/storage/uploads/text.png')}}" width="100%">
    </div>
</div>
<div class="clients_container">
    <div class="clients_block">
        <div class="client_text">
            <span>Наши клиенты</span>
        </div>
        <div class="image_clients">
            <div class="clients_img_groups1">
                <img src="{{url('/storage/homepage/Uvelka.png')}}" width="285px">
                <img src="{{url('/storage/homepage/neptun.png')}}" width="368px">
                <img src="{{url('/storage/homepage/nord.png')}}" width="90px">
                <img src="{{url('/storage/homepage/privoz.png')}}" width="237px">
            </div>
            <div class="clients_img_groups2">
                <img src="{{url('/storage/homepage/zasonja.png')}}" width="255px">
                <img src="{{url('/storage/homepage/zakupka.png')}}" width="345px">
            </div>
        </div>
    </div>
</div>
@endsection

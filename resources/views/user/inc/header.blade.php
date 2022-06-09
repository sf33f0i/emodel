<div class="header_client">
    <div class="container_header_client">
        <img src="{{url('storage/uploads/logotype_white.png')}}" width="224px"; height="55px;">
        <div class="nav_menu">
            @if(\Illuminate\Support\Facades\Route::currentRouteName()=='home_client')
            <a class="a_hrader_active" href="/">Главная</a>
            @else
                <a class="a_hrader" href="/">Главная</a>
            @endif
            @if(\Illuminate\Support\Facades\Route::currentRouteName()=='catalog')
                 <a class="a_hrader_active" href="{{route('catalog')}}">Каталог</a>
            @else
                 <a class="a_hrader" href="{{route('catalog')}}">Каталог</a>
            @endif
                @if(\Illuminate\Support\Facades\Route::currentRouteName()=='basket')
                    <a class="a_hrader_active" href="{{route('basket')}}"><span>Корзина</span> @if(\App\Models\Basket::count()!=0)<div class="basket_uved">{{\App\Models\Basket::count()}}</div> @endif</a>
                @else
                    <a class="a_hrader" href="{{route('basket')}}"><span>Корзина</span> @if(\App\Models\Basket::count()!=0)<div class="basket_uved">{{\App\Models\Basket::count()}}</div> @endif</a>
                @endif
            <span>Доставка</span>
            <span>Наши работы</span>
        </div>
        <div class="contact_container">
            <div class="phone">
                <img src="{{url('/storage/uploads/phone.svg')}}" width="30px">
                <div class="phone_text">
                    <span class="number_phone">+7 (982) 762-15-56</span>
                    <span class="perezvonim">Перезвоним за минуту</span>
                </div>
            </div>
            <div class="map">
                <img src="{{url('/storage/uploads/map.svg')}}" width="30px">
                <div class="map_text">
                    <span class="city"> г.Екатеринбург, <span class="street">ул.Новостроя, 1А</span></span>
                </div>
            </div>
        </div>
    </div>
</div>

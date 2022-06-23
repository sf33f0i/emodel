<div class="header_client">
    <div class="container_header_client">
        <img src="{{url('storage/uploads/logotype_white.png')}}" class="image_logotype">
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
                @if(\Illuminate\Support\Facades\Route::currentRouteName()=='contacts')
                    <a class="a_hrader_active" href="{{route('contacts')}}">Контакты</a>
                @else
                    <a class="a_hrader" href="{{route('contacts')}}">Контакты</a>
                @endif
                @if(\Illuminate\Support\Facades\Route::currentRouteName()=='ourWorks')
                    <a class="a_hrader_active" href="{{route('ourWorks')}}">Наши работы</a>
                @else
                    <a class="a_hrader" href="{{route('ourWorks')}}">Наши работы</a>
                @endif
        </div>
        <div class="contact_container">
            <div class="phone">
                <img src="{{url('/storage/uploads/phone.svg')}}" width="30px" style="margin-right: 14px">
                <div class="phone_text">
                    <span class="number_phone">+7 (982) 762-15-56</span>
                    <span class="perezvonim">Перезвоним за минуту</span>
                </div>
            </div>
            <div class="map">
                <img src="{{url('/storage/uploads/map.svg')}}" width="30px" style="margin-right: 5px">
                <div class="map_text">
                    <span class="city"> г.Екатеринбург, <span class="street">ул.Новостроя, 1А</span></span>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="menu_admin" id="menu">
    <div class="contain_logo">
        <img class="logo_img" src="{{url('/storage/uploads/logotype.png')}}">
        <div class="line"></div>
    </div>
    <div class="menu_nav">
        <div class="menu_point">
            <div class="name_nav">Управление продуктами</div>
            <div class="open_menu" id="open_menu">
                @if(\Illuminate\Support\Facades\Route::currentRouteName()=='adminProducts_all')
                    <div class="active_a"><div class="text_nav">Продукты</div></div>
                @else
                    <a class="a" href="{{route('adminProducts_all')}}"><span class="text_nav">Продукты</span></a>
                @endif
                @if(\Illuminate\Support\Facades\Route::currentRouteName()=='admin_components_all')
                    <div class="active_a"><span class="text_nav">Компоненты</span></div>
                @else
                    <a class="a" href="{{route('admin_components_all')}}"><span class="text_nav">Компоненты</span></a>
                @endif

            </div>
        </div>
        <div class="menu_point" style="margin-top: 26px">
            <div class="name_nav">Управление заказами</div>
            <div class="open_menu" id="open_menu">
                @if(\Illuminate\Support\Facades\Route::currentRouteName()=='orders')
                    <div class="active_a"><div class="text_nav">Заказы</div></div>
                @else
                    <a class="a" href="{{route('orders')}}"><span class="text_nav">Заказы</span></a>
                @endif
                @if(\Illuminate\Support\Facades\Route::currentRouteName()=='messages')
                    <div class="active_a"><div class="text_nav">Сообщения</div></div>
                @else
                    <a class="a" href="{{route('messages')}}"><span class="text_nav">Сообщения</span></a>
                @endif
                @if(\Illuminate\Support\Facades\Route::currentRouteName()=='statistics')
                    <div class="active_a"><span class="text_nav">Статистика</span></div>
                @else
                    <a class="a" href="{{route('statistics')}}"><span class="text_nav">Статистика</span></a>
                @endif
            </div>
        </div>
        <div class="menu_point" style="margin-top: 26px">
            <div class="name_nav">Управление банерами</div>
            <div class="open_menu" id="open_menu">
                @if(\Illuminate\Support\Facades\Route::currentRouteName()=='banners')
                    <div class="active_a"><div class="text_nav">Главная страница</div></div>
                @else
                    <a class="a" href="{{route('banners')}}"><span class="text_nav">Главная страница</span></a>
                @endif
            </div>
            <div class="open_menu" id="open_menu">
                @if(\Illuminate\Support\Facades\Route::currentRouteName()=='works')
                    <div class="active_a"><div class="text_nav">Наши работы</div></div>
                @else
                    <a class="a" href="{{route('works')}}"><span class="text_nav">Наши работы</span></a>
                @endif
            </div>
        </div>
        <div class="menu_point" style="margin-top: 26px">
            <a href="{{route('logout')}}" class="exit">Выйти</a>
        </div>
    </div>
</div>

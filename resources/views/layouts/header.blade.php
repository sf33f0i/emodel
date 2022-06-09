<div class="header">
    <div class="left_header">
        <div onclick="menu('menu')" style="margin-right: 30px">
            <img src="{{url('/storage/uploads/menu_img.svg')}}" width="40px">
        </div>
        @yield('title')
    </div>
    <div class="right_header">
        <div class="user_email_name">
            <div>{{ \Illuminate\Support\Facades\Auth::user()->email }}</div>
            <div>{{ \Illuminate\Support\Facades\Auth::user()->name }}</div>
        </div>
        <img class="user_img" src="{{url('/storage/uploads/user.png')}}">
    </div>
</div>

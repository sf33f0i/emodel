@extends('layouts.layout')
@section('title')
    <h1 style="font-size: 28px">Заказы</h1>
@endsection
@section('content')
    <div class="order_admin_container">
        <div class="search_order">
            <form class="search">
                <input class="input_search typeahead" name="search" type="text" placeholder="Введите электонную почту заказчика" autocomplete="on">
                <button style="border: none; background: none" type="submit"><img src="{{url('/storage/homepage/lupa.png')}}" width="25px" height="25px" style="margin-right: 13px"></button>
            </form>
            <select class="select_catalog" onchange="window.location.href = this.options[this.selectedIndex].value">
                <option value="{{route('orders')}}">Все заказы</option>
                <option value="{{\App\Models\Order::filter_add('status', 0)}}" @if(isset($_GET['status'])) @if($_GET['status']==0) selected @endif @endif>Ожидает сборки</option>
                <option value="{{\App\Models\Order::filter_add('status', 1)}}" @if(isset($_GET['status'])) @if($_GET['status']==1) selected @endif @endif>В процессе сборки</option>
                <option value="{{\App\Models\Order::filter_add('status', 2)}}"@if(isset($_GET['status'])) @if($_GET['status']==2) selected @endif @endif>Доставка</option>
                <option value="{{\App\Models\Order::filter_add('status', 3)}}"@if(isset($_GET['status'])) @if($_GET['status']==3) selected @endif @endif>Готово</option>
            </select>
        </div>
        <div class="order_table">
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Имя</th>
                    <th>Электронная почта</th>
                    <th scope="col">Номер телефона</th>
                    <th scope="col">Изображение</th>
                    <th scope="col">Сообщение</th>
                </tr>
                </thead>
                <tbody>
                @foreach($messages as $message)
                    <tr>
                        <th scope="row">{{$message->id}}</th>
                        <td>{{$message->name}}</td>
                        <td>{{$message->email}}</td>
                        <td>{{$message->number}}</td>
                        <td>
                            <a data-fancybox="gallery"
                               data-caption="Изображение" class="grouped_elements" rel="group1" href="{{url('/storage/'.$message->image)}}">
                                <img src="{{url('/storage/'.$message->image)}}" width="200px"  alt=""/>
                            </a>
                        </td>
                        <td>
                            {{$message->message}}
                        </td>
                        <td>
                            <a href="{{route('order_card', $message)}}" class="btn btn-primary">Просмотреть</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @include('admin.typehead')
@endsection

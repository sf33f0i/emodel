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
             <option value="{{\App\Models\Order::filter_add('status', 0)}}" @if(isset($_GET['status'])) @if($_GET['status']==0) selected @endif @endif>В процессе</option>
             <option value="{{\App\Models\Order::filter_add('status', 1)}}"@if(isset($_GET['status'])) @if($_GET['status']==1) selected @endif @endif>Готовые</option>
             <option value="{{\App\Models\Order::filter_add('status', 2)}}"@if(isset($_GET['status'])) @if($_GET['status']==2) selected @endif @endif>Требуют подверждения</option>
         </select>
     </div>
     <div class="order_table">
         <table class="table">
             <thead>
             <tr>
                 <th scope="col">ID</th>
                 <th scope="col">Заказчик</th>
                 <th>Электронная почта</th>
                 <th scope="col">Адрес</th>
                 <th scope="col">Телефон</th>
                 <th scope="col">Сумма заказа</th>
                 <th scope="col">Статус</th>
                 <th scope="col">Подробней</th>
             </tr>
             </thead>
             <tbody>
             @foreach($orders as $order)
             <tr>
                 <th scope="row">{{$order->id}}</th>
                 <td>{{$order->name}} {{$order->surname}}</td>
                 <td>{{$order->email}}</td>
                 <td>{{$order->country}}, {{$order->region}},{{$order->city}}</td>
                 <td>{{$order->phone}}</td>
                 <td>{{number_format($order->amount, 0, ',', ' ')}} ₽</td>
                 <td>
                     @if($order->status == 0)
                         <div>В процессе</div>
                         @elseif($order->status == 1)
                         <div>Готов</div>
                     @endif

                 </td>
                <td>
                    <a href="{{route('order_card', $order)}}" class="btn btn-primary">Просмотреть</a>
                </td>
             </tr>
             @endforeach
             </tbody>
         </table>
     </div>
 </div>
    @include('admin.typehead')
@endsection

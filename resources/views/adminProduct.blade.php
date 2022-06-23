@extends('layouts.layout')
@section('title')
    <h1 style="font-size: 28px">Продукты</h1>
@endsection
@section('content')
<div class="admin_container_create">
    <button id="callback-button" class="btn btn-success">Создать</button>
    @include('inc.admin_modal_create_product')

    <table class="table">
        <thead>
        <tr>
            <th scope="col">id</th>
            <th scope="col">Изображение</th>
            <th scope="col">Наименование</th>
            <th scope="col">Цена</th>
            <th scope="col">Тип</th>
            <th scope="col">Длина</th>
            <th scope="col">Ширина</th>
            <th scope="col">Скидочная цена</th>
            <th scope="col">Компоненты</th>
            <th scope="col">Доп изображения</th>
            <th scope="col">Действия</th>

        </tr>
        </thead>
        <tbody>
        @foreach($products as $product)
        <tr>
            <th scope="row">{{$product -> id}}</th>
            <td>
                <img class="image_admin_product" src="{{url('/storage/'.$product->image)}}">
            </td>
            <td class="table_td">{{$product -> name}}</td>
            <td class="table_td">{{$product -> price}} ₽</td>
            <td class="table_td">{{$product -> type}}</td>
            <td class="table_td">{{$product -> width}}</td>
            <td class="table_td">{{$product -> height}}</td>
            <td class="table_td">@if(!isset($product->discount))
                    <?php
                    echo "Нет скидки";
                    ?>
                @else
                    {{$product->discount}} ₽
                @endif
            </td>
            <td class="table_td">
                <a href="?components={{$product->id}}"  data-toggle="modal" data-target="#components{{$product->id}}"><img src="{{url('/storage/uploads/edit.png')}}" width="28px"></a>
                @include('inc.modal_component')
            </td>
            <td class="table_td">
                <a href="?products={{$product->id}}"  data-toggle="modal" data-target="#products{{$product->id}}"><img src="{{url('/storage/uploads/edit.png')}}" width="28px"></a>
                @include('admin.modal.product_image')
            </td>
            <td class="table_td">
                <div class="td_delete_and_edit">
                    <form method="POST" action="{{route('admin_product_delete', $product)}}" class="form_delete_admin">
                        @csrf
                        @method('DELETE')
                        <a href="?delete={{$product->id}}" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal{{$product->id}}">Удалить</a>
                        <a href="?edit={{$product->id}}" class="btn btn-warning" style="margin-left: 10px" data-toggle="modal" data-target="#editModal{{$product->id}}">Редактировать</a>
                        @include('inc.admin_modal_delete')
                    </form>
                    @include('inc.admin_modal_product_edit')
                </div>
            </td>
        </tr>
        @endforeach
    </table>
</div>
@include('inc.scripts')
@endsection

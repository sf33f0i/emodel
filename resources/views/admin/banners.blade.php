@extends('layouts.layout')
@section('content')
<div class="banners_container">
    <button id="banner-button" class="btn btn-success" data-toggle="modal" data-target="#create_banner">Добавить баннер</button>
    @include('admin.modal.create_banner')
    <table class="table">
        <thead>
        <tr>
            <th>Заголовок</th>
            <th>Содержание</th>
            <th>Текст кнопки</th>
            <th>Ссылка кнопки</th>
            <th>Изображение</th>
            <th>Действие</th>
        </tr>
        </thead>
        <tbody>
        @foreach($banners as $banner)
        <tr>
            <td>{{$banner->big_text}}</td>
            <td>{{$banner->medium_text}}</td>
            <td>{{$banner->button_text}}</td>
            <td>{{$banner->button_href}}</td>
            <td> <img class="image_admin_product" src="{{url('/storage/'.$banner->image)}}"> </td>
            <td>
                <div class="td_delete_and_edit">
                    <form method="POST" action="{{route('delete_banner', $banner)}}" class="form_delete_admin">
                        @csrf
                        @method('DELETE')
                        <a href="?edit={{$banner->id}}" class="btn btn-warning" data-toggle="modal" data-target="#update_banner{{$banner->id}}">Изменить</a>
                        <a href="?delete={{$banner->id}}" class="btn btn-danger" data-toggle="modal" data-target="#delete_banner{{$banner->id}}">Удалить</a>
                        @include('admin.modal.delete_banner')
                    </form>
                    @include('admin.modal.update_banner')
                </div>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
</div>
@include('inc.scripts')
@endsection

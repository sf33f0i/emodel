@extends('layouts.layout')
@section('title')
    <h1 style="font-size: 28px">Наши работы</h1>
@endsection
@section('content')
<div style="display:flex;flex-direction: column;width: 100%;align-items: center;justify-content: center;margin-top: 50px">
<form method="POST" action="{{route('create_works')}}" enctype="multipart/form-data" style="display: flex;flex-direction: column;width: 300px;justify-content: space-between;align-items: center">
    @csrf
    <div class="mb-3">
        <label for="formFile" class="form-label">Изображение</label>
        <input name="image" class="form-control" type="file" id="formFile">
    </div>
    <select name="option" class="form-select" aria-label="Пример выбора по умолчанию">
        <option value="0" selected>Варианты внешней отделки</option>
        <option value="1">Варианты внутренней отделки</option>
    </select>
    <input type="submit" class="btn btn-success mt-2">
</form>
    <div class="works_container_admin">
        <span style="font-size: 18px;font-family: 'MontserratSemiBold',serif;">Варианты внешней отделки</span>
        <div class="works_image">
            @foreach($images->where('option',0) as $image)
            <div style="display: flex;flex-direction: column; margin-right: 10px;margin-bottom: 10px" >
                <img src="{{url('storage/'.$image->image)}}" width="fit-content" height="200px">
                <form method="POST" action="{{route('delete_works', $image->id)}}">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger mt-2" type="submit">Удалить</button>
                </form>
            </div>
            @endforeach
        </div>

    <div style="display:flex;width: 100%;justify-content: flex-start;align-items: center; margin-top: 50px">
        <span style="font-size: 18px;font-family: 'MontserratSemiBold',serif;">Варианты внешней отделки</span>
    </div>
    <div class="works_image">
        @foreach($images->where('option',1) as $image)
            <div style="display: flex;flex-direction: column; margin-right: 10px" >
                <img src="{{url('storage/'.$image->image)}}" width="fit-content" height="300px">
                <form method="POST" action="{{route('delete_works', $image->id)}}">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger mt-2" type="submit">Удалить</button>
                </form>
            </div>
        @endforeach
    </div>
</div>
@endsection

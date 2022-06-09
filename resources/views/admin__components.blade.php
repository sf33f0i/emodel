@extends('layouts.layout')
@section('title')
    <h1 style="font-size: 28px">Компоненты</h1>
@endsection
@section('content')
    <div class="admin_container_create">
        <form method="POST" action="{{route('admin_components_create')}}" enctype="multipart/form-data" class="component_create_form mt-5 needs-validation" novalidate>
            @csrf
            <div class="col-md-4 w-100">
                <label for="validationCustom01" class="form-label">Название компенента</label>
                <input type="text" name="name" class="form-control" id="validationCustom01" required>
                <div class="invalid-feedback">
                    Введите название
                </div>
            </div>
            <div class="col-md-4 w-100">
                <label for="validationCustom02" class="form-label">Материалы</label>
                <input type="text" class="form-control" name="materials" id="validationCustom02" required>
                <div class="invalid-feedback">
                    Введите материалы
                </div>
            <input type="submit" name="submit" class="btn btn-success mt-2 w-100" value="Добавить">
            </div>
        </form>
        <div class="message">
            @include('inc.messages')
        </div>
        <div style="background: #B9B9B9; height: 1px;width: 600px"></div>
        <div class="components_all">
            @foreach($components as $component)
            <div class="component">
                <div class="component_space">
                    <div class="component_edit_delete">
                        <a href="?editComponent={{$component->id}}" data-toggle="modal" data-target="#editModalComponent{{$component->id}}"><img src="{{url('/storage/uploads/edit.png')}}" width="14px"></a>
                        @include('inc.admin_modal_component_edit')
                        <form method="POST" action="{{route('delete_component', $component->id)}}">
                            @method('DELETE')
                            @csrf
                            <button class="component_delete_button" type="submit"><img src="{{url('/storage/uploads/close.svg')}}" width="12px" alt=""></button>
                        </form>
                    </div>
                </div>
                <div class="container_components">
                    <span class="components_name">{{$component->name}}: {{$component->materials}}</span>
                </div>
                <div class="component_space"></div>
            </div>
            @endforeach
        </div>
        @include('inc.scripts')
    </div>
@endsection

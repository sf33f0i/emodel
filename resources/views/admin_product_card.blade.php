@extends('layouts.layout')
@section('content')
    <div class="admin_container_create">
        <div class="components_container">
            @if(isset($id->discount))
                <div style="color: red"> Скидка! {{$id->price - $id->discount}} рублей</div>
            @endif
            @foreach($id ->components as $component)
                <div>{{$component-> name}} : {{$component-> materials}} </div>
            @endforeach
        </div>
    </div>
@endsection

@extends('layouts.layout')
@section('content')
    <div class="admin_container_create">
        <form method="POST" action="{{route('product_attach_component')}}" enctype="multipart/form-data" class="admin_form">
            @csrf
            <select name="product">
                @foreach($products as $product)
                <option value="{{$product->id}}">{{$product->name}}</option>
                @endforeach
            </select>
            <select name="component">
                @foreach($components as $component)
                    <option value="{{$component->id}}">{{$component->name}} : {{$component->materials}}</option>
                @endforeach
            </select>
            <input type="submit" name="submit">
        </form>
        @foreach($productHas as $product)
            {{$product -> name}}
            @foreach($product ->components as $component)
                <form method="POST" action="{{route('product_detach_component')}}" enctype="multipart/form-data" class="admin_form">
                    @csrf
                    <input type="hidden" name="componentId" value="{{$component->id}}">
                    <input type="hidden" name="productId" value="{{$product->id}}">
                    {{$component-> name}} : {{$component-> materials}}|
                    <input type="submit" name="submit" value="Удалиь">
                </form>
            @endforeach
        @endforeach
        <div class="message">
            @include('inc.messages')
        </div>
    </div>
@endsection

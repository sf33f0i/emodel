@extends('layout_client.layout2')
@section('content')
<div class="client_works_container">
    <div class="client_works_content">
        <div class="works_name1">
            <span>Варианты внешней отделки</span>
        </div>
        <div class="works_content1">
            @foreach($images->where('option', '=', 0 ) as $image)
                <a data-fancybox="gallery"
                   data-caption="{{$image->name}}" class="grouped_elements" rel="group1" href="{{url('/storage/'.$image->image)}}">
                    <img src="{{url('/storage/'.$image->image)}}" class="work_images"  alt=""/>
                </a>
            @endforeach
        </div>

    </div>
    <div class="client_works_content" style="margin-top: 90px">
        <div class="works_name1">
            <span>Варианты внутренней отделки</span>
        </div>
        <div class="works_content2">
            @foreach($images->where('option', '=', 1 ) as $image)
                <a data-fancybox="gallery"
                   data-caption="{{$image->name}}" class="grouped_elements" rel="group1" href="{{url('/storage/'.$image->image)}}">
                    <img src="{{url('/storage/'.$image->image)}}" class="work_images"  alt=""/>
                </a>
            @endforeach
        </div>

    </div>
</div>
@endsection

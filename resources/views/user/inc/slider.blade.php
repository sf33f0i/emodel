@foreach($banners as $banner)
<div class="slider_content">
    <div class="slider_text">
        <span class="big_text">{!!$banner->big_text!!}</span>
        <span class="medium_text">{!!$banner->medium_text!!}</span>
        <a class="button_slider">{{$banner->button_text}}</a>
    </div>
    <div class="image_slider">
        <img src="{{url('/storage/'.$banner->image)}}" style="object-fit: cover;width: 100%;">
    </div>
</div>
@endforeach
<div class="arrows_slider">
    <div class="arrows_slider_content">
        <img src="{{url('/storage/uploads/arrow_left.svg')}}" onclick="minusSlide()" width="40px">
        <img src="{{url('/storage/uploads/arrow_right.png')}}" onclick="plusSlide()" width="40px">
    </div>
</div>
@include('user.inc.scripts.script')

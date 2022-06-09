@foreach($product ->components as $component)
    <form method="POST" id="form_delete" action="{{route('product_detach_component', $product->id)}}" enctype="multipart/form-data" class="component_model_form">
        @csrf
        <div class="space_modal_card_component">
            <input type="hidden" name="componentId" value="{{$component->id}}" id="componentId">
            <div class="component_card">
                {{$component-> name}} : {{$component-> materials}}
            </div>
        </div>
        <button type="submit" id="submit" name="submit" class="delete_component"><img src="{{url('/storage/uploads/close.svg')}}" width="18" alt=""></button>
    </form>
@endforeach

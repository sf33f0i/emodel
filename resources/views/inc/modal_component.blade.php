<div class="modal fade" id="components{{$product->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content shadow">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Компоненты "{{$product['name']}}"</h5>
                <button class="modal__close-button" data-dismiss="modal" aria-label="Close"><img src="{{url('/storage/uploads/close.svg')}}" width="18" alt=""></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{route('product_attach_component', $product->id)}}" enctype="multipart/form-data" class="modal_form_components">
                    @csrf
                    <div class="input-group mb-3">
                        <select class="form-select" id="inputGroupSelect01" name="component">
                                @foreach($components as $component)
                                    <option value="{{$component->id}}">{{$component->name}} : {{$component->materials}}</option>
                                @endforeach
                        </select>
                    </div>
                    <input type="submit" name="submit" class="btn btn-success" value="Добавить">
                </form>
                <div class="components_all" id="modal-body-component">
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
                </div>
            </div>
        </div>
    </div>
</div>

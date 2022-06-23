<div class="modal fade" id="products{{$product->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content shadow">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Изображения "{{$product['name']}}"</h5>
                <button class="modal__close-button" data-dismiss="modal" aria-label="Close"><img src="{{url('/storage/uploads/close.svg')}}" width="18" alt=""></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{route('image_add', $product->id)}}" enctype="multipart/form-data" class="modal_form_components">
                    @csrf
                    <div class="input-group mb-3 flex-column" id="type">
                        <label class="mb-2" for="type">Схема:</label>
                        <input type="file" name="scheme">
                    </div>
                    <div class="input-group mb-3 flex-column" id="type">
                        <label class="mb-2" for="type">Варианты:</label>
                        <input type="number" name="number" placeholder="Номер варианта">
                        <input type="file" name="images">
                    </div>
                    <div class="input-group mb-3 flex-column" id="type">
                        <label class="mb-2" for="type">Дополнительные изображения:</label>
                        <input type="file" name="addendum[]" multiple>
                    </div>
                    <input type="submit" name="submit" class="btn btn-success" value="Добавить">
                </form>
                <div class="images_all" id="modal-body-component">
                    @foreach($product ->images->where('type', '=', 0) as $image)
                        <form method="POST" id="form_delete" action="{{route('image_delete', $image->id)}}" enctype="multipart/form-data" class="images_all_content">
                            @method('DELETE')
                            @csrf
                            <div class="space_modal_card_component">
                                <span>Схема</span>
                                <input type="hidden" name="componentId" value="{{$image->id}}" id="componentId">
                                <div class="img_card">
                                    <img src="{{url('/storage/'.$image->image)}}" width="300px">
                                </div>
                            </div>
                            <button type="submit" id="submit" name="submit" class="delete_component"><img src="{{url('/storage/uploads/close.svg')}}" width="18" alt=""></button>
                        </form>
                    @endforeach
                    @foreach($product ->images->where('type', '=', 1)->sortBy('number') as $image)
                            <form method="POST" id="form_delete" action="{{route('image_delete', $image->id)}}" enctype="multipart/form-data" class="images_all_content">
                                @method('DELETE')
                                @csrf
                                <div class="space_modal_card_component">
                                    <span>{{$image->number}}</span>
                                    <input type="hidden" name="componentId" value="{{$image->id}}" id="componentId">
                                    <div class="img_card">
                                        <img src="{{url('/storage/'.$image->image)}}" width="300px">
                                    </div>
                                </div>
                                <button type="submit" id="submit" name="submit" class="delete_component"><img src="{{url('/storage/uploads/close.svg')}}" width="18" alt=""></button>
                            </form>
                        @endforeach
                        @foreach($product ->images->where('type', '=', 2) as $image)
                            <form method="POST" id="form_delete" action="{{route('image_delete', $image->id)}}" enctype="multipart/form-data" class="images_all_content">
                                @method('DELETE')
                                @csrf
                                <div class="space_modal_card_component">
                                    <span>Доп. изобр.</span>
                                    <input type="hidden" name="componentId" value="{{$image->id}}" id="componentId">
                                    <div class="img_card">
                                        <img src="{{url('/storage/'.$image->image)}}" width="300px">
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

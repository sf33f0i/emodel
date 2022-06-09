<div class="modal fade" id="editModal{{$product->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content shadow">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Изображения "{{$product['name']}}"</h5>
                <button class="modal__close-button" data-dismiss="modal" aria-label="Close"><img src="{{url('/storage/uploads/close.svg')}}" width="18" alt=""></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{route('admin_product_update', $product)}}" enctype="multipart/form-data" class="admin_form needs-validation" novalidate>
                    @csrf
                    @method('patch')
                    @csrf
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="inputGroup-sizing-default">Название</span>
                        <input type="text" name="name" value="{{$product->name}}" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" required>
                        <div class="invalid-feedback">
                            Пожалуйста, введите название товара.
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="inputGroup-sizing-default">Цена</span>
                        <input type="number" name="price" value="{{$product->price}}" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" required>
                        <div class="invalid-feedback">
                            Пожалуйста, введите цену товара.
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <label class="input-group-text" for="inputGroupSelect01">Тип</label>
                        <select class="form-select" id="inputGroupSelect01" name="type">
                            <option @if($product->type == 'Бытовка')  selected @endif value="Бытовка">Бытовка</option>
                            <option @if($product->type == 'Гараж')  selected @endif value="Гараж">Гараж</option>
                            <option @if($product->type == 'Модульный дом')  selected @endif value="Модульный дом">Модульный дом</option>
                        </select>
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="inputGroup-sizing-default">Ширина</span>
                        <input type="text" name="width" value="{{$product->width}}" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" required>
                        <div class="invalid-feedback">
                            Пожалуйста, введите ширину.
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="inputGroup-sizing-default">Высота</span>
                        <input type="text" name="height" value="{{$product->height}}" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" required>
                        <div class="invalid-feedback">
                            Пожалуйста, введите высоту.
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="inputGroup-sizing-default">Скидочная цена</span>
                        <input type="text" name="discount" value="{{$product->discount}}" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                    </div>
                    <div class="input-group mb-3">
                        <input type="file" name="image" class="form-control" id="inputGroupFile01">
                    </div>
                    <input type="submit" value="Редактировать" name="submit" class="btn btn-primary">
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="update_banner{{$banner->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content shadow">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Добавить баннер</h5>
                <button class="modal__close-button" data-dismiss="modal" aria-label="Close"><img src="{{url('/storage/uploads/close.svg')}}" width="18" alt=""></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{route('update_banner', $banner->id)}}" enctype="multipart/form-data" class="form_banners_create needs-validation" novalidate>
                    @csrf
                    @method('PATCH')
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="inputGroup-sizing-default">Заголовок</span>
                        <input type="text" name="big_text" value="{{$banner->big_text}}" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" required>
                        <div class="invalid-feedback">
                            Поле не должно быть пустым.
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="inputGroup-sizing-default">Содержание</span>
                        <input type="text" name="medium_text" value="{{$banner->medium_text}}" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" required>
                        <div class="invalid-feedback">
                            Поле не должно быть пустым.
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="inputGroup-sizing-default">Текст кнопки</span>
                        <input type="text" name="button_text" value="{{$banner->button_text}}" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" required>
                        <div class="invalid-feedback">
                            Поле не должно быть пустым.
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="inputGroup-sizing-default">Ссылка кнопки</span>
                        <input type="text" name="button_href" value="{{$banner->button_href}}" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
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

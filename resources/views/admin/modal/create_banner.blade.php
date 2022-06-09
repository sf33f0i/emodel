<div class="modal fade" id="create_banner" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content shadow">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Добавить баннер</h5>
                <button class="modal__close-button" data-dismiss="modal" aria-label="Close"><img src="{{url('/storage/uploads/close.svg')}}" width="18" alt=""></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{route('create_banner')}}" enctype="multipart/form-data" class="form_banners_create needs-validation" novalidate>
                    @csrf
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="inputGroup-sizing-default">Заголовок</span>
                        <input type="text" name="big_text"  class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" required>
                        <div class="invalid-feedback">
                            Поле не должно быть пустым.
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="inputGroup-sizing-default">Содержание</span>
                        <input type="text" name="medium_text"  class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" required>
                        <div class="invalid-feedback">
                            Поле не должно быть пустым.
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="inputGroup-sizing-default">Текст кнопки</span>
                        <input type="text" name="button_text"  class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" required>
                        <div class="invalid-feedback">
                            Поле не должно быть пустым.
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="inputGroup-sizing-default">Ссылка кнопки</span>
                        <input type="text" name="button_href"  class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                    </div>
                    <div class="input-group mb-3">
                        <input type="file" name="image" class="form-control" id="inputGroupFile01" required>
                        <div class="invalid-feedback">
                            Выберите изображение.
                        </div>
                    </div>
                    <input type="submit" value="Редактировать" name="submit" class="btn btn-primary">
                </form>
            </div>
        </div>
    </div>
</div>

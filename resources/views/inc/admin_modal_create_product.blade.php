<div class="modal1">
    <div class="modal__content">
        <button class="modal__close-button"><img src="{{url('/storage/uploads/close.svg')}}" width="18" alt=""></button>
        <!-- Контент модального окна -->
        <h1 class="modal__title">Создать продукт</h1>
        <form method="POST" action="{{route('adminProduct_create')}}" enctype="multipart/form-data" class="admin_form needs-validation" novalidate>
            @csrf
            <div class="input-group mb-3">
                <span class="input-group-text" id="inputGroup-sizing-default">Название</span>
                <input type="text" name="name" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" required>
                <div class="invalid-feedback">
                    Пожалуйста, введите название товара.
                </div>
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text" id="inputGroup-sizing-default">Цена</span>
                <input type="number" name="price" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" required>
                <div class="invalid-feedback">
                    Пожалуйста, введите название товара.
                </div>
            </div>
            <div class="input-group mb-3">
                <label class="input-group-text" for="inputGroupSelect01">Тип</label>
                <select class="form-select" id="inputGroupSelect01" name="type" required>
                    <option selected value="">Выберите</option>
                    <option value="Бытовка">Бытовка</option>
                    <option value="Гараж">Гараж</option>
                    <option value="Модульный дом">Модульный дом</option>
                </select>
                <div class="invalid-feedback">
                    Пожалуйста, укажите тип товара.
                </div>
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text" id="inputGroup-sizing-default">Ширина</span>
                <input type="text" name="width" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" required>
                <div class="invalid-feedback">
                    Укажите ширину.
                </div>
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text" id="inputGroup-sizing-default">Высота</span>
                <input type="text" name="height" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" required>
                <div class="invalid-feedback">
                    Укажите высоту.
                </div>
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text" id="inputGroup-sizing-default">Скидочная цена</span>
                <input type="text" name="discount" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
            </div>
            <div class="input-group mb-3">
                <input type="file" name="image">
                <div class="invalid-feedback">
                    Выберите изображение для товара.
                </div>
            </div>
            <input type="submit" value="Создать" name="submit" class="btn btn-primary">
        </form>
    </div>
</div>

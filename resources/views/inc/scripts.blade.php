<script>
    $(function () {
        $('#callback-button').click(function () {
            $('.modal1').addClass('modal_active');
        });

        $('.modal__close-button').click(function () {
            $('.modal1').removeClass('modal_active');
        });
    });
    // Закрытие модального окна при клике вне его контентной области
    $('.modal1').mouseup(function (e) {
        let modalContent = $(".modal__content");
        if (!modalContent.is(e.target) && modalContent.has(e.target).length === 0) {
            $(this).removeClass('modal_active');
        }
    });

    (function () {
        'use strict'

        // Получите все формы, к которым мы хотим применить пользовательские стили проверки Bootstrap
        var forms = document.querySelectorAll('.needs-validation')

        // Зацикливайтесь на них и предотвращайте отправку
        Array.prototype.slice.call(forms)
            .forEach(function (form) {
                form.addEventListener('submit', function (event) {
                    if (!form.checkValidity()) {
                        event.preventDefault()
                        event.stopPropagation()
                    }

                    form.classList.add('was-validated')
                }, false)
            })
    })()

</script>
<script>
    function menu(id){
        elem = document.getElementById(id); //находим блок div по его id, который передали в функцию
        state = elem.style.display; //смотрим, включен ли сейчас элемент
        if (state =='') elem.style.display='none'; //если включен, то выключаем
        else elem.style.display=''; //иначе - включаем
    }
</script>

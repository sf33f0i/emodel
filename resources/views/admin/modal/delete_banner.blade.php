<div class="modal fade" id="delete_banner{{$banner->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content shadow">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Вы уверены?</h5>
                <button class="modal__close-button" data-dismiss="modal" aria-label="Close"><img src="{{url('/storage/uploads/close.svg')}}" width="18" alt=""></button>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Отмена</button>
                <form action="?id={{$banner->id}}" method="post" >
                    <button type="submit" name="delete_submit" class="btn btn-danger">Удалить</button>
                </form>
            </div>
        </div>
    </div>
</div>

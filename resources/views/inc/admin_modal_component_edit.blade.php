<div class="modal fade" id="editModalComponent{{$component->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content shadow">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Редактировать "{{$component['name']}}"</h5>
                <button class="modal__close-button" data-dismiss="modal" aria-label="Close"><img src="{{url('/storage/uploads/close.svg')}}" width="18" alt=""></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{route('edit_component', $component)}}" enctype="multipart/form-data" class="form_edit_component needs-validation">
                    @csrf
                    @method('patch')
                    @csrf
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="inputGroup-sizing-default">Название</span>
                        <input type="text" name="name" value="{{$component->name}}" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="inputGroup-sizing-default">Материалы</span>
                        <input type="text" name="materials" value="{{$component->materials}}" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                    </div>
                    <input type="submit" value="Редактировать" name="submit" class="btn btn-primary">
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#delete_{{$type}}_{{$data->id}}">
    {{trans('buttons_trans.delete')}}
</button>

<!-- Modal -->
<div class="modal fade" id="delete_{{$type}}_{{$data->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">delete</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{route($routes,$data->id)}}" method="post">
                    @method('DELETE')
                    @csrf

                    <div class="modal-body">
                        <h3>{{trans('messages_trans.delete_sure')}}</h3>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-danger">{{trans('buttons_trans.delete')}}</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>

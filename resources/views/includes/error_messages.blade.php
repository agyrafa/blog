@foreach($errors->all() as $error)
    <div class="alert alert-danger errors">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close" title="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <ul>
            <li>{{ $error }}</li>
        </ul>
    </div>
@endforeach
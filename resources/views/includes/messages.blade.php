@foreach($errors->all() as $error)
    <div class="alert alert-danger errors">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close" title="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <ul>
            <li><span class="glyphicon glyphicon-exclamation-sign"></span>&nbsp{{ $error }}</li>
        </ul>
    </div>
@endforeach

@if (Session::has('message'))
    <div class="alert alert-success">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close" title="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <p><span class="glyphicon glyphicon-ok-sign"></span>&nbsp;{{ Session::get('message') }}</p>
    </div>
@endif
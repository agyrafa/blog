@foreach($errors->all() as $error)
    <div class="alert alert-danger errors">
        <ul>
            <li>{{ $error }}</li>
        </ul>
    </div>
@endforeach
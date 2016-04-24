@extends('layouts.base')

@section('title')
    Edit Post
@endsection

@section('content')
    <div class="wrapper">
        @include('includes.messages')
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Edit Post</h3>
            </div>
            <div class="panel-body">
        <form action="" method="post">
            <div class="form-group">
            <textarea class="form-control" name="edit_post" id="edit_post" rows="10"></textarea>
            </div>
            <button class="btn btn-success" type="submit">Save</button>
            <a class="btn btn-default" href="{{ route('home') }}">Back</a>
            <input type="hidden" value="{{ Session::token() }}" name="_token">
        </form>
            </div>
        </div>
    </div>
@endsection
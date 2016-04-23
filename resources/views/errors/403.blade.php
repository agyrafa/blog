@extends('layouts.base')

@section('title')
    Access denied!
@endsection

@section('content')
    <div class="wrapper account">
        <div class="panel panel-danger">
            <div class="panel-heading">
                <h3 class="panel-title">Access denied</h3>
            </div>
            <div class="panel-body">
                You don't have permission! <a href="{{ route('home') }}">Back</a>
            </div>
        </div>
    </div>
@endsection
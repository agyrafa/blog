@extends('layouts.base')

@section('title')
    Account
@endsection

@section('content')
    @include('includes.header')
    <div class="wrapper">
        <div class="account">
        @include('includes.messages')
        <div class="panel panel-default">
            <div class="panel-body">
            <p><strong>Username:</strong> {{ $user->username }}</p>
            <p><strong>E-mail:</strong> {{ $user->email }}</p>
            <p><strong>Joined:</strong> {{ $user->created_at}}</p>
            <p><strong>Last visited:</strong> {{ $user->updated_at }}</p>
                </div>
            </div>
        </div>
    </div>
@endsection

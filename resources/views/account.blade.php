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
                @if (Storage::disk('public')->has($user->username . '-' . $user->id .'.jpg'))
                <img src="{{ route('account.photo', ['filename' => $user->username . '-' . $user->id . '.jpg']) }}" width="30%" height="30%" name="account_photo" alt="account_photo">
                @else
                    <img src="{{ asset('src/img/noavatar.png') }}">
                @endif
        <form action="{{ route('account.update') }}" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="account_photo">Image</label>
                <input type="file" id="account_photo" class="form-control" name="account_photo">
            </div>
            <p><strong>Username:</strong> {{ $user->username }}</p>
            <p><strong>E-mail:</strong> {{ $user->email }}</p>
            <p><strong>Joined:</strong> {{ $user->created_at}}</p>
            <p><strong>Last visited:</strong> {{ $user->updated_at }}</p>
            <button type="submit" class="btn btn-success">Save</button>
            <a href="{{ route('home') }}" class="btn btn-default">Back</a>
            <input type="hidden" value="{{ Session::token() }}" name="_token">
        </form>
                </div>
            </div>
        </div>
    </div>
@endsection

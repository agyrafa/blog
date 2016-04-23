@extends('layouts.base')

@section('title')
    Account
@endsection

@section('content')
    <div class="wrapper">
        <div class="account">
        @include('includes.messages')
        <div class="panel panel-default">
            <div class="panel-body">
                @if (Storage::disk('public')->has($user->username . '-' . $user->id .'.jpg'))
                <img src="{{ route('account.photo', ['filename' => $user->username . '-' . $user->id . '.jpg']) }}" width="30%" height="30%" name="account_photo" alt="account_photo">
                @endif
        <form action="{{ route('account.update') }}" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="account_photo">Image (only .jpg)</label>
                <input type="file" id="account_photo" class="form-control" name="account_photo">
            </div>
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" id="username" class="form-control" name="username" value="{{ $user->username }}">
            </div>
            <p><strong>Joined:</strong> {{ $user->created_at}}</p>
            <p><strong>Last visited:</strong> {{ $user->updated_at }}</p>
            <button type="submit" class="btn btn-success">Save</button>
            <a href="{{ route('dashboard') }}" class="btn btn-default">Back</a>
            <input type="hidden" value="{{ Session::token() }}" name="_token">
        </form>
                </div>
            </div>
        </div>
    </div>
@endsection

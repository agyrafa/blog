@extends('layouts.base')

@section('title')
    Sign In
@endsection

@section('content')
    <div class="wrapper">
        <div class="account">
            @include('includes.messages')
            <h3>Sign Up</h3>
            <div class="panel panel-default">
                <div class="panel-body">
                    <form action="{{ route('signup') }}" method="post">
                        <div class="form-group">
                            <label for="email">Your E-Mail</label>
                            <input class="form-control" type="email" name="email" id="email" required="required" value="{{ Request::old('email') }}">
                        </div>
                        <div class="form-group">
                            <label for="username">Your Username</label>
                            <input class="form-control" type="text" name="username" id="username" required="required" value="{{ Request::old('username') }}">
                        </div>
                        <div class="form-group">
                            <label for="password">Your Password</label>
                            <input class="form-control" type="password" name="password" id="password" required="required">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <a class="btn btn-default" href="{{ route('home') }}">Back</a>
                        <input type="hidden" name="_token" value="{{ Session::token() }}">
                    </form>
        </div>
    </div>
@endsection
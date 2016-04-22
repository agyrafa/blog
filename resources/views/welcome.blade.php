@extends('layouts.base')

@section('content')
<div class="container">
    <div class="wrapper">
        <div class="row">
            @include('includes.error_messages')
            <div class="col-md-6">
                <h3>Sign Up</h3>
                <form action="{{ route('signup') }}" method="post">
                    <div class="form-group">
                        <label for="email">Your E-Mail</label>
                        <input class="form-control" type="email" name="email" id="email" value="{{ Request::old('email') }}">
                    </div>
                    <div class="form-group">
                        <label for="username">Your Username</label>
                        <input class="form-control" type="text" name="username" id="username" value="{{ Request::old('username') }}">
                    </div>
                    <div class="form-group">
                        <label for="password">Your Password</label>
                        <input class="form-control" type="password" name="password" id="password">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <input type="hidden" name="_token" value="{{ Session::token() }}">
                </form>
            </div>
            <div class="col-md-6">
                <h3>Sign In</h3>
                <form action="{{ route('signin') }}" method="post">
                    <div class="form-group">
                        <label for="email">Your E-Mail</label>
                        <input class="form-control" type="email" name="email" id="email" value="{{ Request::old('email') }}">
                    </div>
                    <div class="form-group">
                        <label for="password">Your Password</label>
                        <input class="form-control" type="password" name="password" id="password" ">
                    </div>
                    <button type="submit" class="btn btn-success">Submit</button>
                    <input type="hidden" name="_token" value="{{ Session::token() }}">
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

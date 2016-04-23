@extends('layouts.base')

@section('title')
    Dashboard
@endsection

@section('content')
    <div class="container">
        <div class="logout">
            <a class="btn btn-primary" href="{{ route('account') }}">Account</a>
            <a class="btn btn-danger" href="{{ route('logout') }}">Logout</a>
        </div>
        <div class="wrapper">
            <div class="posting-form">
                <form action="{{ route('post.create') }}" method="post">
                    <textarea class="form-control" name="content" rows="8"></textarea>
                    <button class="btn btn-success post-control" type="submit">Post</button>
                    <input type="hidden" value="{{ Session::token() }}" name="_token">
                </form>
            </div>
            <div class="posts">
                @include('includes.messages')
                @foreach($posts as $post)
                <div class="panel panel-default">
                    <div class="panel-body">
                        <p id="content">{{ $post->content }}</p>
                    </div>
                    <div class="panel-footer">
                        <span>{{ $post->user->username }}</span> &#124;
                        <span>{{ $post->created_at }}</span>
                        <div class="control pull-right">
                            <a href="#" title="Up">
                                <span class="glyphicon glyphicon-circle-arrow-up"></span>
                            </a>
                            <a href="#" title="Down">
                                <span class="glyphicon glyphicon-circle-arrow-down"></span>
                            </a>
                            @if (Auth::user() == $post->user)
                                &#149;
                            <a href="#" title="Edit">
                                <span class="glyphicon glyphicon-pencil"></span>
                            </a>
                            <a href="{{ route('post.delete', ['post_id' => $post->id]) }}" title="Delete">
                                <span class="glyphicon glyphicon-remove-circle"></span>
                            </a>
                            @endif
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="text-center">
                <p>v.1.0</p>
            </div>
        </div>
    </div>
@endsection

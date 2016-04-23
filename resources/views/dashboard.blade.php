@extends('layouts.base')

@section('content')
    <div class="container">
        <div class="logout">
            <a href="{{ route('logout') }}">Logout</a>
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
                @include('includes.error_messages')
                @foreach($posts as $post)
                <div class="panel panel-default">
                    <div class="panel-body">
                        <p id="content">{{ $post->content }}</p>
                    </div>
                    <div class="panel-footer">
                        <span>{{ $post->user->username }}</span> &#124;
                        <span>{{ $post->created_at }}</span>
                        @if (Auth::user() == $post->user)
                        <div class="control pull-right">
                            <a href="{{ route('post.delete', ['post_id' => $post->id]) }}" title="Delete"><span class="glyphicon glyphicon-remove"></span></a>
                        </div>
                        @endif
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

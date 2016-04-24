@extends('layouts.base')

@section('title')
    Dashboard
@endsection

@section('content')
        @if (!Auth::check())
        <div class="sign-up-in">
            <a class="btn btn-primary" href="{{ route('sign.up') }}">Sign Up</a>
            <a class="btn btn-success" href="{{ route('sign.in') }}">Sign In</a>
        </div>
        @endif
        @if (Auth::check())
        <div class="logout">
            <a href="{{ route('inbox') }}" title="Inbox" class="btn btn-default" type="button"><span class="glyphicon glyphicon-inbox"></span></a>
            <a class="btn btn-primary" href="{{ route('account') }}">Settings</a>
            <a class="btn btn-danger" href="{{ route('logout') }}">Logout</a>
        </div>
        @endif
        <div class="content">
            @if (Auth::check())
            <div class="posting-form">
                <form action="{{ route('post.create') }}" method="post" enctype="multipart/form-data">
                    <textarea class="form-control" name="content" rows="8" autofocus="autofocus"></textarea>
                    <div class="post-control">
                        <label title="Location" class="btn" for="location"><span class="glyphicon glyphicon-map-marker"></span></label>
                        <input type="text" class="hidden" id="location" name="location">
                        <label title="Video" class="btn" for="video"><span class="glyphicon glyphicon-facetime-video"></span></label>
                        <input type="text" class="hidden" id="video" name="video">
                        <label title="Audio" class="btn" for="audio"><span class="glyphicon glyphicon-music"></span></label>
                        <input type="text" class="hidden" id="audio" name="audio">
                        <label title="Image" class="btn" for="upload_photo"><span class="glyphicon glyphicon-picture"></span></label>
                        <input type="file" class="hidden" id="upload_photo" name="upload_photo">
                    <button class="btn btn-success" type="submit">Post</button>
                    </div>
                    <input type="hidden" value="{{ Session::token() }}" name="_token">
                </form>
            </div>
            @endif
            <div class="posts">
                @include('includes.messages')
                @foreach($posts as $post)
                <div class="panel panel-default">
                    <div class="panel-body">
                        @if (Auth::user() == $post->user)
                            <div class="control pull-right">
                                <a href="{{ route('edit_post') }}" title="Edit">
                                    <span class="glyphicon glyphicon-pencil"></span>
                                </a>
                                <a href="{{ route('post.delete', ['post_id' => $post->id]) }}" title="Delete">
                                    <span class="glyphicon glyphicon-remove-circle"></span>
                                </a>
                            </div>
                        @endif
                        <p id="content">{{ $post->content }}</p>
                        @if (Storage::disk('public')->has($post->id .'.jpg'))
                        <hr>
                        <div class="row">
                            <div class="col-xs-6 col-md-3">
                                <a href="{{ route('upload.photo', ['filename' => $post->id . '.jpg']) }}" class="thumbnail" target="_blank">
                                    <img src="{{ route('upload.photo', ['filename' => $post->id . '.jpg']) }}" alt="photo">
                                </a>
                            </div>
                        </div>
                        @endif
                    </div>
                    <div class="panel-footer">
                        <span>{{ $post->user->username }}</span> &#124;
                        <span>{{ $post->created_at }}</span>
                        <div class="info pull-right">
                                <span title="Total score" class="badge">43</span>
                            @if(Auth::check())
                                <a href="#" title="Up">
                                    <span class="glyphicon glyphicon-circle-arrow-up"></span>
                                </a>
                                <a href="#" title="Down">
                                    <span class="glyphicon glyphicon-circle-arrow-down"></span>
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
                <nav class="text-center">
                    <ul class="pagination">
                        <li class="disabled"><a href="#" aria-label="Previous"><span aria-hidden="true">&laquo;</span></a></li>
                        <li class="active"><a href="#">1 <span class="sr-only">(current)</span></a></li>
                        <li><a href="#">2 <span class="sr-only">(current)</span></a></li>
                        <li><a href="#">3 <span class="sr-only">(current)</span></a></li>
                        <li><a href="#">4 <span class="sr-only">(current)</span></a></li>
                        <li><a href="#">5 <span class="sr-only">(current)</span></a></li>
                        <li>
                            <a href="#" aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            <div class="text-center">
                <p>v.1.0</p>
            </div>
        </div> <!-- end wrapper -->
@endsection

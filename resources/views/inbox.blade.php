@extends('layouts.base')

@section('title')
    Inbox
@endsection

@section('content')
        @include('includes.messages')
        <div class="wrapper">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Inbox</h3>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-4">
                <div class="list-group">
                    <button type="button" class="list-group-item">Mike <span class="badge">12</span></button>
                    <button type="button" class="list-group-item">Jack <span class="badge">12</span></button>
                    <button type="button" class="list-group-item">Padre <span class="badge">12</span></button>
                </div>
                    </div>
                    <div class="col-md-8">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate dolorum labore numquam?
                                    Accusantium adipisci amet, beatae doloremque doloribus ea explicabo fugiat magni nisi odit officia
                                    optio quas soluta veritatis vitae!
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Autem corporis
                                    harum id magni quo? Aspernatur beatae, delectus eius
                                    fuga fugit laudantium libero, magni maiores
                                    minus placeat, quae quam quidem rerum.
                                </p>
                                <form action="">
                                    <div class="form-group">
                                    <label for="answer">Answer:</label>
                                    <textarea name="answer" class="form-control" id="answer" rows="10"></textarea>
                                    </div>
                                    <button type="submit" class="btn btn-success">Submit</button>
                                    <a class="btn btn-default" href="{{ route('home') }}">Back</a>
                                    <input type="hidden" value="{{ Session::token() }}" name="_token">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
@endsection
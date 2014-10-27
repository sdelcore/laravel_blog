<!document html>
@extends('layout')
@section('content')

    {{ Form::open(array('url' => 'comment/'.$posts->id)) }}
    <title>{{ $posts->title}} </title>
    <div class="titles">
        {{ $posts->title }}
    </div>

    <p>
        {{ $errors->first('title') }}
        {{ $errors->first('body') }}
    </p>

    <div class="post_info">
        {{ $posts->user->username }} <br/>
        {{ date("d F Y",strtotime($posts->user->created_at)) }} at {{ date("g:ha",strtotime($posts->user->created_at)) }}
    </div>

    <div id="post_body">
        {{ $posts->body }}
    </div>

    <p>
        @foreach($posts->comments as $comment)
            <div id="comment_user">
                <div id="comment_body">
                    {{$comment->body}} <br/>
                </div>
                <div class="username">
                    {{$comment->user->username}} <br/>
                </div>
            </div>
        @endforeach
    </p>

    <p>
        {{ Form::label('comment', 'Comment:')}}<br/>
        {{ Form::textarea('comment') }}
    </p>

<p>{{ Form::submit('Submit') }}</p>

{{ Form::close() }}

@stop
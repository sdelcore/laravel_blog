<!document html>
@extends('layout')
@section('content')

    {{ Form::open(array('url' => 'comment/'.$posts->id)) }}

    <h1>
        {{ $posts->title }}
    </h1>

    <p>
        {{ $errors->first('title') }}
        {{ $errors->first('body') }}
    </p>

    <p>
        {{ $posts->body }}
    </p>

    <p>
        @foreach($posts->comments as $comment)
            {{$comment->user->username}} <br>
            {{$comment->body}} <br>
        @endforeach
    </p>

    <p>
        {{ Form::label('comment', 'Comment')}}
        {{ Form::text('comment') }}
    </p>

<p>{{ Form::submit('Submit') }}</p>

{{ Form::close() }}

@stop
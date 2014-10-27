@extends('layout')
@section('content')
    {{ Form::open(array('url' => 'post')) }}
        <title>Create a Post</title>
        <div class='titles'>Create a Post</div>

        <!-- Shows login errors if any-->
        <p>
        {{ $errors->first('title') }}
        {{ $errors->first('body') }}
        </p>

        <div>
        {{ Form::label('title', 'Title:')}}<br/>
        {{ Form::textarea('title') }}
        </div>

        <p>
        {{ Form::label('body', 'Body:') }}<br/>
        {{ Form::textarea('body') }}
        </p>

        <p>{{ Form::submit('Submit') }}</p>

    {{ Form::close() }}

@stop
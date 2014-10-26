@extends('layout')
@section('content')
    {{ Form::open(array('url' => 'post')) }}
        <h1>Post</h1>

        <!-- Shows login errors if any-->
        <p>
        {{ $errors->first('title') }}
        {{ $errors->first('body') }}
        </p>

        <p>
        {{ Form::label('title', 'Title')}}
        {{ Form::text('title') }}
        </p>

        <p>
        {{ Form::label('body', 'Body') }}
        {{ Form::text('body') }}
        </p>

        <p>{{ Form::submit('Submit') }}</p>

    {{ Form::close() }}

@stop
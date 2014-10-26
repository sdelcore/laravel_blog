<!-- app/view/login.blade.php -->

@extends('layout')
@section('content')

    {{ Form::open(array('url' => 'login')) }}

        <h1>Login</h1>

        <p>
            {{ $errors->first('email') }}
            {{ $errors->first('password') }}
        </p>

        <p>
            {{ Form::label('username', 'Username')}}
            {{ Form::text('username', Input::old('username'), array('placeholder' => 'jsmith')) }}
        </p>

        <p>
            {{ Form::label('password', 'Password') }}
            {{ Form::password('password') }}
        </p>

        <p>{{ Form::submit('Submit!') }}</p>

    {{ Form::close() }}

@stop
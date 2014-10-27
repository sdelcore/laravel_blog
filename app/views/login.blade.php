<!-- app/view/login.blade.php -->

@extends('layout')
@section('content')
    {{ Form::open(array('url' => 'login')) }}
            <title>Login</title>

            <div class="titles">Login</div>

            <div>
                {{ $errors->first('username') }}
                {{ $errors->first('password') }}
                {{ Session::get('flash_error') }}
            </div>

            <p>
                {{ Form::label('username', 'Username:')}}<br/>
                {{ Form::text('username', Input::old('username')) }}
            </p>

            <p>
                {{ Form::label('password', 'Password:') }}<br/>
                {{ Form::password('password') }}
            </p>

            <p>{{ Form::submit('Login!') }}</p>
    {{ Form::close() }}
@stop

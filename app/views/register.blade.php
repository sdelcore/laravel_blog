<!-- app/view/login.blade.php -->

@extends('layout')
@section('content')
    {{ Form::open(array('url' => '/register')) }}

        <h1>Registration</h1>

        <!-- Shows login errors if any-->
        <p>
        {{ $errors->first('email') }}
        {{ $errors->first('password') }}
        {{ $errors->first('username') }}
        {{ $errors->first('first_name') }}
        {{ $errors->first('surname') }}
        </p>

        <p>
        {{ Form::label('username', 'Username')}}
        {{ Form::text('username', Input::old('username'), array('placeholder' => 'jsmith')) }}
        </p>

        <p>
        {{ Form::label('password', 'Password') }}
        {{ Form::password('password') }}
        </p>

        <p>
        {{ Form::label('retype_password', 'Retype Password') }}
        {{ Form::password('retype_password') }}
        </p>

        <p>
        {{ Form::label('email', 'Email') }}
        {{ Form::email('email') }}
        </p>

        <p>
        {{ Form::label('retype_email', 'Retype Email') }}
        {{ Form::email('retype_email') }}
        </p>

        <p>
        {{ Form::label('first_name', 'First Name') }}
        {{ Form::text('first_name', Input::old('first_name'), array('placeholder' => 'John')) }}
        </p>

        <p>
        {{ Form::label('surname', 'Surname') }}
        {{ Form::text('surname', Input::old('surname'), array('placeholder' => 'Smith')) }}
        </p>

        <p>{{ Form::submit('Submit') }}</p>

    {{ Form::close() }}
@stop
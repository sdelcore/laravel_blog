<!-- app/view/login.blade.php -->

@extends('layout')
@section('content')
    {{ Form::open(array('url' => '/register')) }}
        <title>Registration</title>

        <div class="titles">Registration</div>

        <!-- Shows login errors if any-->
        <p>
        {{ $errors->first('email') }}
        {{ $errors->first('password') }}
        {{ $errors->first('username') }}
        {{ $errors->first('first_name') }}
        {{ $errors->first('surname') }}
        </p>

        <p>
        {{ Form::label('username', 'Username:')}} <br/>
        {{ Form::text('username', Input::old('username')) }}
        </p>

        <p>
        {{ Form::label('password', 'Password:') }}<br/>
        {{ Form::password('password') }}
        </p>

        <p>
        {{ Form::label('retype_password', 'Retype Password:') }}<br/>
        {{ Form::password('retype_password') }}
        </p>

        <p>
        {{ Form::label('email', 'Email:') }}<br/>
        {{ Form::email('email') }}
        </p>

        <p>
        {{ Form::label('retype_email', 'Retype Email:') }}<br/>
        {{ Form::email('retype_email') }}
        </p>

        <p>
        {{ Form::label('first_name', 'First Name:') }}<br/>
        {{ Form::text('first_name', Input::old('first_name')) }}
        </p>

        <p>
        {{ Form::label('surname', 'Surname:') }}<br/>
        {{ Form::text('surname', Input::old('surname')) }}
        </p>

        <p>{{ Form::submit('Register!') }}</p>

    {{ Form::close() }}
@stop
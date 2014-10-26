@extends('layout')
@section('content')

	<h1>
        Welcome to my blog!
	</h1>


        @foreach ($posts as $post)
        <h2>{{ $post->title }} <br></h2>
        {{ $post->user->username }} <br>
        <p>{{ substr($post->body, 0, 140)."..." }} <br></p>
        <a href="{{ URL::to('comment/'.$post->id) }} ">Read More</a>
        @endforeach




@stop

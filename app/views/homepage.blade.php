@extends('layout')
@section('content')
        <title>My Blog</title>
        <div>
            {{ Session::get('flash_notice') }}
        </div>
        @foreach ($posts as $post)
        <div id="home_post_title">
            {{ $post->title }} <br/>
        </div>
        <div class="username">
            {{ $post->user->username }} <br/>
        </div>
        <p id="home_post_body">
            @if(strlen($post->body) > 140)
                {{ substr($post->body, 0, 140)."..." }}
            @else
                {{ $post->body }}
            @endif <br/>
        </p>
        <a href="{{ URL::to('comment/'.$post->id) }} " id="home_read_more">Read More</a> <br/>
        <hr/>
        @endforeach




@stop

@extends('layouts.master')


@section('content')
    <ul>
        @foreach($timeline as $tweet)
            <li>
                {{ Twitter::linkify($tweet->text) }}
            </li>
        @endforeach
    </ul>

@stop
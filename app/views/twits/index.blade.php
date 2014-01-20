@extends('layouts.master')

@section('content')
    <ul>
        @foreach($twits as $twit)
            <li>
                {{ $twit->twit }}
            </li>
        @endforeach
    </ul>    
@stop
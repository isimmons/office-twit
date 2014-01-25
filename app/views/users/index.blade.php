@extends('layouts.master')

@section('title')
    Office Twit | All Users
@stop

@section('content')
    <div class="col-md-4 well">
        <ul class="users-list">
            @foreach($users as $user)
                <li>
                    <img src="{{ getGravitar($user->gravitar) }}">
                    {{ $user->username }}
                </li>
            @endforeach
        </ul>
    </div>   
@stop
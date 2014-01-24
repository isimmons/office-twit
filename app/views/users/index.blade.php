@extends('layouts.master')

@section('content')
    <ul class="users-list">
        @foreach($users as $user)
            <img src="{{ getGravitar($user->gravitar) }}">
            <li>{{ $user->username }}</li>
        @endforeach
    </ul>
@stop
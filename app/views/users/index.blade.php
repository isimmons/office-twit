@extends('layouts.master')

@section('content')
    <div class="col-md-4 well">
        <ul class="users-list">
            @foreach($users as $user)
                <li>
                    <img src="{{ getGravitar($user->gravitar) }}">
                    {{link_to('/twits/'.$user->username, '@'.$user->username) }}
                </li>
            @endforeach
        </ul>
    </div>   
@stop
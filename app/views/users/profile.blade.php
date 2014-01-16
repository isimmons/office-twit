@extends('layouts.master')

@section('content')
    <h2>Welcome {{ $user->username }}!</h2>

    <div class="col-md-4">
        @include('users.partials._profileForm')
    </div>
    
@stop
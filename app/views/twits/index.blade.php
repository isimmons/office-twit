@extends('layouts.master')

@section('content')
    <div class="col-md-6 timeline">
         @include('twits.partials._timelineSideBar')
    </div>


    <div class="col-md-6 timeline">
        <h2>Public Twits</h2>
        <ul class="well">
            
            @foreach($twits as $twit)
                <li>
                    <div class="twit-user">
                        <img src="{{ getGravitar($twit->user->gravitar) }}">
                        <span class="twit-handle">{{ '@' . $twit->user->username }}</span> 
                    </div>
                   <div class="twit">
                        {{ $twit->twit }} 
                   </div>
                                      
                </li>
                <hr class="twit-separator">
            @endforeach
        </ul>
    </div>
@stop
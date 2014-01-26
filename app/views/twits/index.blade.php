@extends('layouts.master')

@section('content')
    <div class="col-md-6 timeline">
         @include('twits.partials._timelineSideBar')
    </div>


    <div class="col-md-6 timeline">
        <h2>Public Twits</h2>
        <ul class="well">
            @foreach($users as $user)
                @foreach($user->twits as $twit)
                <li>
                    <div class="twit-gravitar">
                        <img src="{{ getGravitar($user->gravitar) }}">                         
                    </div>
                   <div class="twit">
                        <div class="twit-handle">
                            {{link_to('/twits/'.$user->username, '@'.$user->username) }}
                        </div>
                        <div class="twit-text">{{ $twit->twit }}</div> 
                   </div>                                      
                </li>
                <hr class="twit-separator">
                @endforeach
            @endforeach
           
        </ul>
    </div>
@stop
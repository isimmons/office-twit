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
                    <div class="twit-gravitar">
                        <img src="{{ getGravitar($twit->user->gravitar) }}">                         
                    </div>
                   <div class="twit">
                        <div class="twit-handle">
                            {{link_to('/twits/'.$twit->user->username, '@'.$twit->user->username) }}
                        </div>
                        <div class="twit-text">{{ $twit->twit }}</div> 
                   </div>                                      
                </li>
                <hr class="twit-separator">                
            @endforeach           
        </ul>
    </div>
@stop
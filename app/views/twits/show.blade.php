@extends('layouts.master')

@section('content')
    <div class="col-md-6 timeline">
         @include('twits.partials._timelineSideBar')
    </div>

    <div class="col-md-6 timeline">
        <h2>{{ucfirst($user->username)}}'s Twits</h2>
        {{ getFollowLink($user) }}
        
        
        <ul class="well">
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
        </ul>
    </div>
   
@stop
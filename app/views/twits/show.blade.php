@extends('layouts.master')

@section('content')
    <div class="col-md-6 timeline">
         @include('twits.partials._timelineSideBar')
    </div>

    <div class="col-md-6 timeline">
        <h2>My Twits</h2>
        <ul class="well">
            @foreach($twits as $twit)
                <li>{{ $twit->twit }}</li>
            @endforeach
        </ul>
    </div>
   
@stop
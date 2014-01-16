@extends('layouts.master')

@section('content')
    <ul>
        @foreach($twits as $twit)
            <li>
                {{ $twit->twit }}
            </li>
        @endforeach
    </ul>

    {{ $tweets }}
    <a class="twitter-timeline" href="https://twitter.com/twitterapi" data-widget-id="YOUR-WIDGET-ID-HERE">Tweets by @twitterapi</a>
    <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
@stop
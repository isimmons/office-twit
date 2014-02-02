@extends((isset($publicTweets) and $publicTweets !== false)  ? 'layouts.two_column' :'layouts.master')


@section('left-content')
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
   
    
@stop

@section('right-content')
            <h2>Twitter Timeline</h2>
             <ul class="well">
                    @foreach($publicTweets as $tweet)
                        <li>
                            <div class="twit-gravitar">
                                <img src="{{ $tweet->user->profile_image_url }}">                         
                            </div>
                            <div class="twit-text">
                                {{ Twitter::linkify($tweet->text) }}
                            </div>                            
                        </li>
                        <hr class="twit-separator">
                    @endforeach
                </ul>
              
@stop
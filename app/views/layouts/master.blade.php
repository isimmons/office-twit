<!doctype html>
<html class="no-js">
    <head>
        <meta charset="utf-8">
        <title>@yield('title', 'Office Twit')</title>
 
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width">
        @yield('meta')
 
         <!-- stylesheets -->
        {{ HTML::style('//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.0.3/css/bootstrap.min.css') }}
        {{ HTML::style('//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.3/css/font-awesome.min.css') }}
        @yield('styles')
        {{ HTML::style('css/styles.css') }}
 
 
        {{ HTML::script('//cdnjs.cloudflare.com/ajax/libs/modernizr/2.7.1/modernizr.min.js') }}
        <script>
            var URL = {
                'base' : '{{ URL::to('/') }}',
                'current' : '{{ URL::current() }}',
                'full' : '{{ URL::full() }}'
            };
        </script>
    </head>
<body>
 
    @include('partials._header') 
    
    <div class="container">
        @yield('main.prepend')
        
        <div id="content">
            @yield('content')
        </div><!-- ./ #content -->

        <div id="sidebar">
            @yield('sidebar')
        </div><!-- ./ #sidebar -->

        @yield('main.append')
    </div><!--./ .container-->
    
 
    @yield('footer.prepend')
    @include('partials._footer')
    @yield('footer.append')
 
 
     <!-- scripts -->
    {{ HTML::script('//cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js') }}
    {{ HTML::script('//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.0.3/js/bootstrap.min.js') }}
    @yield('scripts')
    {{ HTML::script('js/app.js') }}
 
    <!-- un-comment for analytics
    <script>
        var _gaq=[['_setAccount','UA-XXXXX-X'],['_trackPageview']];
        (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
        g.src='//www.google-analytics.com/ga.js';
        s.parentNode.insertBefore(g,s)}(document,'script'));
    </script>
    -->
</body>
</html>
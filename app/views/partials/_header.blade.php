<header>
    <div class="container">
        @yield('navbar.prepend')
            @include('partials._navbar')
        @yield('navbar.append')
    </div>
</header>
    
<div class="flash">
    {{ Session::get('flash_message') }}
</div>
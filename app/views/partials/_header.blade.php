<header>
    <div class="container">
        @yield('navbar.prepend')
            @include('partials._navbar')
        @yield('navbar.append')
    </div>
</header>

@if(Session::has('flash_message'))    
    {{ getFlash(Session::get('flash_message')) }}
@endif
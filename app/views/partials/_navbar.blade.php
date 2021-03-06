<nav class="navbar navbar-inverse">
    <div class="navbar-header">
        {{ link_to('/', Config::get('officeTwit.appName'), ['class' => 'navbar-brand']) }}
        <a class="navbar-toggle" data-toggle="collapse" data-target="#top-nav">&#9776;</a>
    </div><!--./ .navbar-header-->

    <div class="collapse navbar-collapse" id="top-nav">
        <ul class="nav navbar-nav">
            {{ getNavLinks() }}
            @if(Auth::check())
                <li>{{ link_to('logout', 'Logout') }}</li>
            @endif
        </ul>

        <form class="navbar-form navbar-right" role="search">
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Search">
            </div>
            <button type="submit" class="btn btn-default">Submit</button>
        </form>

        
    </div><!--./ #top-nav-->
</nav><!--./ .navbar-->
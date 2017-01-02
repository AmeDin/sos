<!--
<div class="header clearfix">
    <nav>
        <ul class="nav nav-pills pull-right">
            @if(Sentinel::check())
                <li role="presentation">
                    <form action="/logout" method="POST" id="logout-form">
                        {{ csrf_field() }}

                        <a href="#" onclick="document.getElementById('logout-form').submit()">Logout</a>
                    </form>
                </li>
            @else
                <li role="presentation"><a href="/login">Login</a></li>
                <li role="presentation"><a href="/register">Registration</a></li>
            @endif
        </ul>
    </nav>
    <h3 class="text-muted"><a href="/">Self Ordering System</a></h3>
</div>

                -->

<nav class="navbar navbar-default navbar-static-top">
        <div class="navbar-header">

            <!-- Collapsed Hamburger -->
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <!-- Branding Image -->
            <a class="navbar-brand" href="{{ url('/') }}">
                {{ config('app.name', 'Laravel') }}
            </a>
        </div>

        <div class="collapse navbar-collapse" id="app-navbar-collapse">
            <!-- Left Side Of Navbar -->
            <ul class="nav navbar-nav">
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="nav navbar-nav pull-right">
                <!-- Authentication Links -->
                @if (!Sentinel::check())
                    <li><a href="{{ url('/login') }}">Login</a></li>
                    <li><a href="{{ url('/register') }}">Register</a></li>
                @else
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            {{  Sentinel::getUser()->name }} <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" role="menu">
                            <li>
                                <a href="{{ url('/logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    Logout
                                </a>

                                <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>
                    </li>
                @endif
            </ul>
        </div>
</nav>
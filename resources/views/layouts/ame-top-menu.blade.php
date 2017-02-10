
<nav id="mainNav" class="navbar navbar-default navbar-fixed-top add-bg">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span> <i class="fa fa-bars"></i>
            </button>
            <a class="navbar-brand" href="{{ url('/') }}">
                {{ config('app.name', 'Laravel') }}
            </a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                @if (!Sentinel::check())
                    <li><a href="{{ url('/login') }}">Login</a></li>
                    <li><a href="{{ url('/register') }}">Register</a></li>
                @else
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            {{  Sentinel::getUser()->name }} <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu multi-level dropdown-alignment-center" role="menu" >
                            @if(!Sentinel::inRole('admin'))
                            <li class="dropdown-submenu">

                                    <a tabindex="-1" href="{{ route('stalls.index') }}"><i class="fa fa-caret-left force-absolute-left" aria-hidden="true" ></i>My Stall</a>
                                    <ul class="dropdown-menu  dropdown-alignment-center">
                                        <li ><a tabindex="-1" href="{{ route('stalls.index') }}">View All</a></li>
                                        <li class="divider"></li>
                                        <li><a tabindex="-1"href="{{ route('stalls.create') }}">Create</a></li>
                                    </ul>
                            </li>
                            <li class="divider"></li>

                                <li class="dropdown-submenu">

                                    <a tabindex="-1" href="#"><i class="fa fa-caret-left force-absolute-left" aria-hidden="true" ></i>My Earnings</a>
                                    <ul class="dropdown-menu  dropdown-alignment-center">
                                        <li ><a tabindex="-1" href="{{ route('fixedOrders.index') }}">Fixed Order</a></li>
                                        <li class="divider"></li>
                                        <li><a tabindex="-1"href="{{ route('vendors.orderlist',1) }}">Customize Order</a></li>
                                    </ul>
                                </li>






                            @else
                            <li><a href="{{ route('vendors.index') }}"></i>Manage Vendors</a></li>
                            <li class="divider"></li>
                            <li><a href="{{ route('ingredients.index') }}"></i>Manage Ingredients</a></li>
                            <li class="divider"></li>
                            <li><a href="{{ route('logs.index') }}"></i>View Logs</a></li>
                            @endif
                            <li class="divider"></li>
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
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container-fluid -->
</nav>



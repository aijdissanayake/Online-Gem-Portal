        <nav class="navbar navbar-default navbar-static-top">
            <div style="margin-right: 1%">
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
                        <!-- {{ config('app.name', 'Laravel') }} -->
                        Gem Portal
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                        @else
                            <li> <a href="{{route('home')}}"> Home </a> </li>
                            <li> <a href="{{route('visit_shops')}}"> Shops </a> </li>

                            @if(Auth::user()->role != 'buyer')
                                <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    Advertise <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li> <a href="{{route('add_details')}}"> Add Detail </a> </li>
                                    <li> <a href="{{route('advertise_form')}}"> Advertise</a></li>
                                    <li role="separator" class="divider"></li>
                                    <li> <a href="{{route('advertise_form')}}"> View All</a></li>
                                </ul>

                            @endif

                            @if(Auth::user()->role == 'admin')
                                <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    Settings <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li> <a href="{{route('all_shops')}}"> User Settings </a> </li>
                                    <li> <a href="#"> Advertisement Settings</a></li>
                                    <li role="separator" class="divider"></li>
                                    <li> <a href="#"> Dash-Board</a></li>
                                </ul>

                            @endif

                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">

                                    <li> <a href="{{route('profile_view')}}"> View Profile </a> </li>
                                    <li> <a href="{{route('update_view')}}"> Update Profile </a></li>
                                    <li role="separator" class="divider"></li>
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                            <!-- <li> <img src="#" style="align-content: center;"></li> -->
                        @endif
                    </ul>
                </div>
            </div>
        </nav>
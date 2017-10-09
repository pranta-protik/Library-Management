<div style="padding-bottom: 70px">
    <nav class="navbar navbar-inverse navstyle navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="@if(auth()->guest()){{route('/')}}@else{{route('home')}}@endif" style="font-size: 30px;color: white"><strong>Umesh Chandra Library</strong></a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" style="overflow-y: inherit;float: right" id="bs-example-navbar-collapse-1">

                <ul class="nav navbar-nav navbar-right">
                    @if(auth()->user()&&(auth()->user()->role)=="Librarian")
                    <li>
                        <a href="{{route('dashboard')}}">
                            Dashboard
                        </a>
                    </li>
                    @endif
                    @if(auth()->guest())
                        <li>
                            <a href="{{'register'}}"><span class="glyphicon glyphicon-edit"></span>
                                Register
                            </a>
                        </li>
                    @endif
                    @if(auth()->guest())
                    <li>
                        <a href="{{route('login')}}"><span class="glyphicon glyphicon-log-in"></span>
                            Login
                        </a>
                    </li>
                    @endif

                    @if(auth()->user())
                    <li class="dropdowna">
                        <a class="dropbtna" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="#">
                            {{ auth()->user()->firstName }}
                            <span class="caret"></span>
                        </a>
                        <div class="dropdowna-content">
                            <a href="{{ route('profile') }}"><span class="glyphicon glyphicon-user"></span>
                                Profile
                            </a>

                            <a href="{{ route('password.request') }}"><span class="glyphicon glyphicon-lock"></span>
                                Password
                            </a>

                            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <span class="glyphicon glyphicon-log-out"></span>
                                Logout
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>

                        </div>
                    </li>
                    @endif
                </ul>
            </div><!-- /.navbar-collapse -->
        </div>
    </nav>
</div>
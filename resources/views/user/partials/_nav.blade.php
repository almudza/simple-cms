    <section id="navbar">
      <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
          <a href="/" class="navbar-brand">DEVMUS</a>
          
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" >
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
              <li class="nav-item active">
                <a href="/" class="nav-link">Home</a>
              </li>
              <li class="nav-item dropdown">
                <a href="" class="nav-link dropdown-toggle" id="navbarDropdown" data-toggle="dropdown">Android</a>
                <div class="dropdown-menu">
                  <a href="{{ url('/custom') }}" class="dropdown-item">Custom</a>
                  <a href="" class="dropdown-item">Root</a>
                </div>
              </li>
              <li class="nav-item">
                <a href="{{ route('blog') }}" class="nav-link">Blog</a>
              </li>
              <li class="nav-item">
                <a href="" class="nav-link">Contact</a>
              </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
              <form action="">
                <input id="search-menu" type="text" placeholder="Search.." name="search">
              </form>
       {{--          @if (Auth::guest())
              <li class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" id="navbarDropdown" data-toggle="dropdown" >Join</a>
                <div class="dropdown-menu">
                  
                  <a href="{{ route('login') }}" class="dropdown-item">Login</a>
                  <a href="{{ route('register') }}" class="dropdown-item">Register</a>
                @else
                  <div class="dropdown-divider"></div>
                  <a href="{{ route('logout') }}" class="dropdown-item" onclick="event.preventDefault();
                  document.getElementById('logout-form').submit();" >Logout</a>
                  <form action="{{ route('logout') }}" id="logout-form" method="POST" style="display: none;">
                    {{ csrf_field() }}
                  </form>

                </div>
              </li>
                @endif
 --}}


              <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a class="nav-link" href="{{ route('login') }}">Login</a></li>
                            <li><a class="nav-link" href="{{ route('register') }}">Register</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a class="dropdown-item" href="{{ route('logout') }}"
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
                        @endif
                    </ul>
            </ul>
          </div> 
        </div>
      </nav> 
    </section>
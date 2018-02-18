    <section id="navbar">
      <nav class="navbar fixed-top navbar-expand-lg navbar-light bg-light">
        <div class="container">
          <a class="navbar-brand" href="/">
            <img src="{{ asset('user/img/devmus.png') }}"  width="90" height="30" alt="">
          </a>
          
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" >
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
              <li class="nav-item">
                <a href="/" class="nav-link active">Home</a>
              </li>
{{--               <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Android</a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a href="{{ url('/custom') }}" class="dropdown-item">Custom</a>
                  <a href="" class="dropdown-item">Root</a>
                </div>
              </li>
              <li class="nav-item">
                <a href="{{ route('blog') }}" class="nav-link">Blog</a>
              </li>
              <li class="nav-item">
                <a href="" class="nav-link">Contact</a>
              </li> --}}
            </ul>
            <ul class="nav navbar-nav navbar-right">
              <form action="">
                <input id="search-menu" type="text" placeholder="Search.." name="search">
              </form>


              <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a class="nav-link" href="{{ route('login') }}">Login</a></li>
                            <li><a class="nav-link" href="{{ route('register') }}">Register</a></li>
                        @else
                            <li class="dropdown">
                                <a href="" class="nav-link dropdown-toggle" id="name-profile" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                      <a href="{{ route('user.dashboard') }}" class="dropdown-item">Profile</a>
                                    </li>
                                    <div class="dropdown-divider"></div>
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
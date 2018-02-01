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
              <li class="nav-item dropdown">
                <a href="" class="nav-link dropdown-toggle" id="navbarDropdown" data-toggle="dropdown" >Join</a>
                <div class="dropdown-menu">
                  <a href="" class="dropdown-item">Login</a>
                  <a href="" class="dropdown-item">Register</a>
                  <div class="dropdown-divider"></div>
                  <a href="" class="dropdown-item">Logout</a>
                </div>
              </li>
            </ul>
          </div> 
        </div>
      </nav> 
    </section>
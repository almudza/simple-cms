<!doctype html>
<html lang="en">
  <head>
  	@include('user.partials._head')
    
  </head>
  <body>
    
    <!-- section navbar -->
	@include('user.partials._nav')
    <!-- EndNavbar -->
    
    <!-- Jumbotron -->
    @yield('header')

    <!-- EndJumbotron -->
    
    <!-- Content -->
    <div class="container"> 
      <section id="featured"> <!-- Featured Section-->
	{{-- 	@yield('featured') --}}
      </section>

      <section id="content">
        <div class="row mt-sm-4 mt-md-0">
          <!--  main content  -->
          <div class="col-sm-12 col-md-8 text-sm-center text-md-left">
			@yield('content')
          </div>
          <!-- endcontent -->

          <!-- sidebar -->
			@include('user.partials._sidebar')
          <!-- endsidebar -->
        </div>
      </section>

    </div> 
    <!-- container -->

    <section id="profil">
	@include('user.partials._profile')
    </section>

    <!-- ScrollUP -->
    <button id="scrollUp">UP</button>
    <!-- <button onclick="topFunction()" id="myBtn" title="Go to top">Top</button> -->


      <!-- footer -->
    <footer id="footer">
      <p>Devmus, Copyright &copy; @php
        echo date('Y');
      @endphp </p>
    </footer>

    <!-- Optional JavaScript -->
	{{-- include js   --}}
	@include('user.partials._js')



	{{-- Section Smoothing Js --}}
	@yield('js')

  </body>
</html>




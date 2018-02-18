<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
  
  @include('front.partials._head')
<style>
    
    .col-md-6 {
        padding-top: 2em;

    }

</style>

</head>
<body>

    @include('front.partials._nav')
<br>
<div class="container">
    <div class="col-md-12 mx-auto">
	
		        @yield('content')
		    </div>
		</div>
	</div><!--end container-->
</div>
<br>
    <footer id="footer">
      <p>Devmus, Copyright &copy; @php
        echo date('Y');
      @endphp </p>
    </footer>

   @include('front.partials._js')
</body>
</html>
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

<div class="container">
    <div class="col-md-6 mx-auto">
	
		        @yield('content')
		    </div>
		</div>
	</div><!--end container-->
</div>

   @include('front.partials._js')
</body>
</html>
<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
  
  @include('front.partials._head')
<style>
    
    #content {
        padding-top: 2em;

    }

</style>

</head>
<body>

    @include('front.partials._nav')

	<div class="container">
		<div class="row" id="content">
		    <div class="col-md-4 mb-3">
		        <div class="card mx-auto">
		            <div class="card-header text-center">
		                <h4>Menu</h4>
		            </div>
		            <nav class="nav flex-column">
		                <li class="nav-item">
		                    <a href="" class="nav-link">Profile</a>
		                </li>
		            </nav>
		        </div>
		    </div>
		    <div class="col-md-8">
		        @yield('content')
		    </div>
		</div>
	</div><!--end container-->


   @include('front.partials._js')
</body>
</html>

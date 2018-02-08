@if (count($errors) > 0)
	@foreach ($errors->all() as $error)
		<p class="alert alert-danger">{{ $error }} </p>
	@endforeach
@endif


{{-- message --}}
@if (session()->has('message'))
	<p class="alert alert-success">{{ session('message') }} </p>
@endif
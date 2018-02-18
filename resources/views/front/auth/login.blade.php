@extends('front.layouts.appro')

@section('content')

<div class="col-md-6 mx-auto">
  

<form class="form-signin" method="POST" action="{{ route('login') }}">
     {{ csrf_field() }}

      <div class="text-center mb-4">
        <img class="mb-4" src="{{ asset('user/devmus.png') }}" alt="" width="100" height="52">
        {{-- <p>Build form controls with floating labels via the <code>:placeholder-shown</code> pseudo-element. <a href="https://caniuse.com/#feat=css-placeholder-shown">Works in latest Chrome, Safari, and Firefox.</a></p> --}}
      </div>

      <div class="form-label-group {{ $errors->has('email') ? ' has-error' : '' }}">
        <label for="inputEmail">Email address</label>
        <input type="email" id="inputEmail" name="email"  class="form-control" placeholder="Email address" value="{{ old('email') }} " required autofocus>
        @if ($errors->has('email'))
            <span class="help-block">
                <strong>{{ $errors->first('email') }} </strong>
            </span>
        @endif
      </div>

      <div class="form-label-group {{ $errors->has('password') ? ' has-error' : '' }}">
        <label for="inputPassword">Password</label>
        <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" autocomplete required>
        @if ($errors->has('password'))
            <span class="help-block">
                <strong>{{ $errors->first('password') }}</strong>
            </span>
        @endif
      </div>

      <div class="checkbox mb-3">
        <label>
          <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember me
        </label>
      </div>
      <button class="btn btn-lg btn-outline-primary btn-block" type="submit">LogIn</button>

      <a class="btn btn-link" href="{{ route('password.request') }}">Forgot Your Password?</a>
      <p class="mt-5 mb-3 text-muted text-center">&copy; {{ Carbon\Carbon::now()->format('Y') }}  {{ config('app.name') }} </p>
</form>
</div>
@endsection

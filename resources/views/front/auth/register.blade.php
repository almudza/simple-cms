@extends('front.layouts.appro')

@section('content')

<div class="col-md-6 mx-auto">
<form class="form-signin" method="POST" action="{{ route('register') }}">
     {{ csrf_field() }}

      <div class="text-center mb-4 mx-auto">
        <img class="mb-4" src="{{ asset('user/devmus.png') }}" alt="" width="100" height="52">
        <h1 class="h3 mb-3 font-weight-normal">Register Account </h1>
      </div>
      <div class="form-label-group{{ $errors->has('name') ? ' has-error' : '' }} ">
          <label for="name">Name</label>
          <input type="text" id="name" class="form-control" name="name" placeholder="input name" value="{{ old('name') }}" required autofocus>
          @if ($errors->has('name'))
              <span class="help-block">
                  <strong>{{ $errors->first('name') }} </strong>
              </span>
          @endif
      </div>

      <div class="form-label-group{{ $errors->has('email') ? ' has-error' : '' }}">
        <label for="inputEmail">Email address</label>
        <input type="email" id="inputEmail" name="email" class="form-control" placeholder="Email address" value="{{ old('email') }} " required autofocus>
        @if ($errors->has('email'))
            <span class="help-block">
                <strong>{{ $errors->first('email') }} </strong>
            </span>
        @endif
      </div>

      <div class="form-label-group{{ $errors->has('password') ? ' has-error' : '' }}">
        <label for="inputPassword">Password</label>
        <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" autocomplete required>
        @if ($errors->has('password'))
            <span class="help-block">
                <strong>{{ $errors->first('password') }}</strong>
            </span>
        @endif
      </div>
        <div class="form-label-group">
            <label for="password-confirm">Confirm Password</label>
            <input id="password-confirm" type="password" placeholder="Confirm Password" class="form-control" name="password_confirmation" required>
        </div>

      
      <button class="btn btn-lg btn-outline-primary mt-4 btn-block" type="submit">Register</button>

      <p class="mt-5 mb-3 text-muted text-center">&copy; {{ Carbon\Carbon::now()->format('Y') }}  {{ config('app.name') }} </p>
</form>

</div>
@endsection

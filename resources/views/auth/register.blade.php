@extends('layouts.app')

@section('content')
{{-- <div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Register</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

 --}}

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

      
      <button class="btn btn-lg btn-outline-primary btn-block" type="submit">Register</button>

      <p class="mt-5 mb-3 text-muted text-center">&copy; {{ Carbon\Carbon::now()->format('Y') }}  {{ config('app.name') }} </p>
</form>
@endsection

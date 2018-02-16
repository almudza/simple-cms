@extends('front.layouts.app')


@section('content')


            <div class="card mx-auto">
                <div class="card-header">
                    <h1>Dashboard</h1>
                </div>
                <div class="card-body">
                    <p>
                         @if (session('status'))
                                <div class="alert alert-success">
                                    {{ session('status') }}
                                </div>
                            @endif

                      <!--       You are logged in! -->
                    </p>

                    <form class="form-signin" method="POST" action="" enctype="multipart/form-data">
                        {{ csrf_field() }}
                      
                   
                      
                         <div class="form-group text-center mx-auto">
                            <label for="avatar">Avatar</label>
          
                              <div class="parent">
                                <div class="child">
                                  <img src="{{ auth()->user()->getAvatar() }}" width="50%" alt="">
                                </div>
                              </div>
                              <br><br>
                              
                              @if (!auth()->user()->getAvatar())
                                <input type="file" name="avatar" id="avatar" accept="image/*">
                              @endif      
                        </div> <!--end form-gorup-->
 
                         <div class="form-label-group {{ $errors->has('email') ? ' has-error' : '' }}">
                           <label for="inputName">Name</label>
                           <input type="text" id="inputName" name="name" value=" @if(old('name')){{ old('name')}}@else{{  Auth::user()->name }}@endif" class="form-control" required>
                           @if ($errors->has('email'))
                               <span class="help-block">
                                   <strong>{{ $errors->first('name') }} </strong>
                               </span>
                           @endif
                         </div>

                         <div class="form-label-group {{ $errors->has('email') ? ' has-error' : '' }}">
                           <label for="inputEmail">Email address</label>
                           <input type="email" id="inputEmail" name="email" value="{{ Auth::user()->email }}" class="form-control" required>
                           @if ($errors->has('email'))
                               <span class="help-block">
                                   <strong>{{ $errors->first('email') }} </strong>
                               </span>
                           @endif
                         </div>

                         <input type="password" style="display: none">

                        <div class="form-label-group{{ $errors->has('password') ? ' has-error' : '' }}">
                          <label for="inputPassword">New Password</label>
                          <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password">
                          @if ($errors->has('password'))
                              <span class="help-block">
                                  <strong>{{ $errors->first('password') }}</strong>
                              </span>
                          @endif
                        </div>
                        <div class="form-label-group">
                            <label for="password-confirm">Confirm Password</label>
                            <input id="password-confirm" type="password" placeholder="Confirm Password" class="form-control" name="password_confirmation">
                        </div>
                         <br>
                         <button class="btn btn-lg btn-outline-primary btn-block" type="submit">Update</button>
                   
                         
                         <p class="mt-5 mb-3 text-muted text-center">&copy; {{ Carbon\Carbon::now()->format('Y') }}  {{ config('app.name') }} </p>
                   </form>
{{-- form delete thumb --}}
<form action="" id="remove-avatar" method="post" style="display: none;">
    {{ csrf_field() }}
    {{ method_field('DELETE') }}
</form>
                </div> <!---end card body-->
            </div> <!--end card-->

@endsection


@section('js')
<script>
    $(document).ready(function(){
  
        var a = 1;
        $(".child").draggable({
          containment: "parent",
          start: function(event, ui) { $(this).css("z-index", a++); }
        }).hover(function(){
          $(this).prepend('<button class="remove btn btn-xs btn-danger">x</button>');
        }, function(){
          $(this).find('.remove').remove();
        }).on('click', '.remove', function(event){
          $(this).closest('.child').remove();
          event.preventDefault();
          $('#remove-avatar').submit();
        });
  
    });
  </script>
  @endsection
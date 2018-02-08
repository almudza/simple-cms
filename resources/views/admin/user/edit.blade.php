{{-- Admin Create --}}

@extends('admin.main')



@section('content')

<div class="col-md-12">
	@include('admin.partials._error')
	
	<form role="form" action="{{ route('user.update',['id'=> $user->id]) }}" method="post">
		{{ csrf_field() }}
		
		{{ method_field('PUT') }}

	    <div class="box box-default">
	        <div class="box-header with-border">
	          <h3 class="box-title">User Update</h3>
	        </div>
	        <!-- /.box-header -->
	        <div class="box-body">
	          	<div class="row">
		            <div class="col-md-6 col-md-offset-3">
			              <div class="box-body">
				                <div class="form-group">
					                  <label for="Name">Name</label>
					                  <input type="text" class="form-control" name="name" id="Name" value=" @if (old('name')){{ old('name')}}@else{{ $user->name }}@endif " required>
				                </div>
				                <div class="form-group">
					                  <label for="email">email</label>
					                  <input type="email" class="form-control" name="email" id="email" placeholder="Enter Email" value=" @if (old('email')){{ old('email')}}@else{{ $user->email }}@endif " required autocomplete="off">
				                </div>
				                <div class="form-group">
					                  <label for="phone">Phone</label>
					                  <input type="text" class="form-control" name="phone" value="@if (old('phone')){{ old('phone')}}@else{{ $user->phone }}@endif" id="phone" placeholder="Enter Phone" required autocomplete="off">
				                </div>
				                <div class="form-group">
					                  <label for="password">New Password</label>
					                  <input type="password" class="form-control" name="password" id="password" value="{{ old('password') }}" placeholder="Password">
				                </div>

				                <div class="form-group">
				                	<label for="status">Status</label>
				                	<div class="checkbox">
				                		
				                		<label><input type="checkbox" @if (old('status') == 1 || $user->status ==1)
				                			checked 
				                		@endif id="status" name="status" value="1">Status
				                		</label>
				                	</div>
				                </div>

				                <div class="form-group">
		                			<label class="lead mt-2" >Assign Role</label>
		                			<div class="row">

				                	@foreach ($roles as $role)
				                		
					                	<div class="col-md-3">	
						                	<div class="checkbox">
						                		<label for="{{ $role->name}}">
						                			<input name="role[]" id="{{ $role->name }}" type="checkbox" value="{{ $role->id }}" @foreach ($user->roles as $user_role)
						                				@if ($user_role->id == $role->id)
						                					checked
						                				@endif
						                			@endforeach >{{ $role->name }}
						                		</label>
						                	</div>
					                	</div>

				                	@endforeach
				                	</div>

				                </div>
				               
				          </div> <!-- box -->
				          <div class="box-footer">
				          	<a href="{{ route('user.index') }}" class="btn btn-warning">Back</a>
				          	<input type="submit" value="submit" class="btn btn-success">
				          </div>
				    </div> <!-- col -->
				</div><!-- row -->
			</div> <!-- box-body -->
		</div> <!-- box-default -->
	</form>	 <!-- form -->

</div>

@endsection
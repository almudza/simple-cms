{{-- Admin Create --}}

@extends('admin.main')



@section('content')

<div class="col-md-12">
	@include('admin.partials._error')
	
	<form role="form" action="{{ route('user.store') }}" method="post">
		{{ csrf_field() }}
	    <div class="box box-default">
	        <div class="box-header with-border">
	          <h3 class="box-title">User Create</h3>
	        </div>
	        <!-- /.box-header -->
	        <div class="box-body">
	          	<div class="row">
		            <div class="col-md-6 col-md-offset-3">
			              <div class="box-body">
				                <div class="form-group">
					                  <label for="Name">Name</label>
					                  <input type="text" class="form-control" name="name" id="Name" placeholder="Enter Title" autocomplete="off" required>
				                </div>
				                <div class="form-group">
					                  <label for="email">email</label>
					                  <input type="email" class="form-control" name="email" id="email" placeholder="Enter Email" required autocomplete="off">
				                </div>
				                <div class="form-group">
					                  <label for="password">Password</label>
					                  <input type="password" class="form-control" name="password" id="passeord" placeholder="Password" autocomplete="off" required>
				                </div>

				                <div class="form-group">
					                  <label for="confirm_password">Confirm Password</label>
					                  <input type="password" class="form-control" name="name" id="confirm_password" placeholder="Confirm Password" autocomplete="off" required>
				                </div>

				                <div class="form-group col-md-12">

				                	@foreach ($roles as $role)
				                		
					                	<div class="col-md-3">	
						                	<div class="checkbox">
						                		<label for="{{ $role->name}}">
						                			<input name="role[]" id="{{ $role->name }}" type="checkbox" value="{{ $role->id }}">{{ $role->name }}
						                		</label>
						                	</div>
					                	</div>

				                	@endforeach

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
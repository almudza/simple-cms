{{-- permission Edit --}}

@extends('admin.main')



@section('content')

<div class="row">
<div class="col-md-12">
{{-- include pesan error --}}
@include('admin.partials._error')
	<form role="form" action="{{ route('permission.update',['id' => $permission->id]) }}" method="post">
		{{ csrf_field() }}
		{{ method_field('PATCH') }}
	    <div class="box box-default">
	        <div class="box-header with-border">
	          <h3 class="box-title">Edit permission :  <b>{{ $permission->name }} </b></h3>
	        </div>
	        <!-- /.box-header -->
	        <div class="box-body">
	          	<div class="row">
		            <div class="col-md-6 col-md-offset-3">
			              <div class="box-body">
				                <div class="form-group">
					                  <label for="name">Permission</label>
					                  <input type="text" class="form-control" id="name" name="name" value="{{ $permission->name }} " autocomplete="off">
				                </div>

				                <div class="fotm-group">
									<label for="for">Permisssion for</label>
									<select name="for" id="for" class="form-control">
										<option  selected disabled>Select Permission for</option>
										<option value="{{ $permission->id }} "  >{{ $permission->name }} </option>
										<option value="post" >Post</option>
										<option value="other" >Other</option>
									</select>
								</div>

				          
				          </div> <!-- box -->
				          <div class="form-group">
				          	<a href="{{ route('permission.index') }}" class="btn btn-warning">Back</a>
				          	<input type="submit" value="submit" class="btn btn-success">
				          </div>
				    </div> <!-- col -->
				</div><!-- row -->
			</div> <!-- box-body -->
		</div> <!-- box-default -->
	</form>	 <!-- form -->

</div>
</div>

@endsection
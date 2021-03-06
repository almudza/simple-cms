{{-- Category edit --}}

@extends('admin.main')



@section('content')

<div class="col-md-12">
	@include('admin.partials._error')
	
	<form role="form" action="{{ route('category.update',['id'=>$category->id]) }}" method="post">
		{{ csrf_field() }}
		{{ method_field('PUT') }}
	    <div class="box box-default">
	        <div class="box-header with-border">
	          <h3 class="box-title">Category Create</h3>
	        </div>
	        <!-- /.box-header -->
	        <div class="box-body">
	          	<div class="row">
		            <div class="col-md-6 col-md-offset-3">
			              <div class="box-body">
				                <div class="form-group">
					                  <label for="Name">Name</label>
					                  <input type="text" class="form-control" name="name" id="Name" value="{{ $category->name }}">
				                </div>
				               {{--  <div class="form-group">
				                  <label for="slug">Slug</label>
				                  <input type="text" class="form-control" name="slug" id="slug" value="{{ $category->slug }}">
				                </div> --}}
				          </div> <!-- box -->
				          <div class="box-footer">
				          	<a href="{{ route('category.index') }}" class="btn btn-warning">Back</a>
				          	<input type="submit" value="submit" class="btn btn-success">
				          </div>
				    </div> <!-- col -->
				</div><!-- row -->
			</div> <!-- box-body -->
		</div> <!-- box-default -->
	</form>	 <!-- form -->

</div>

@endsection
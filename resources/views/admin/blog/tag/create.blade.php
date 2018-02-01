{{-- Tag Create --}}

@extends('admin.main')



@section('content')

<div class="row">
<div class="col-md-12">
{{-- include pesan error --}}
@include('admin.partials._error')
	<form role="form" action="{{ route('tag.store') }}" method="post">
		{{ csrf_field() }}
	    <div class="box box-default">
	        <div class="box-header with-border">
	          <h3 class="box-title">Tag Create</h3>
	        </div>
	        <!-- /.box-header -->
	        <div class="box-body">
	          	<div class="row">
		            <div class="col-md-6 col-md-offset-3">
			              <div class="box-body">
				                <div class="form-group">
					                  <label for="name">Title</label>
					                  <input type="text" class="form-control" id="name" name="name" placeholder="Enter Tag name" autocomplete="off">
				                </div>
				          {{--       <div class="form-group">
				                  <label for="slug">Slug</label>
				                  <input type="text" class="form-control" id="slug" name="slug" placeholder="slug">
				                </div> --}}
				          </div> <!-- box -->
				          <div class="form-group">
				          	<a href="{{ route('tag.index') }}" class="btn btn-warning">Back</a>
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
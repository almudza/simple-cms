{{-- Post Create --}}

@extends('admin.main')

 {{-- Optional CSS --}}
@section('css')
<link rel="stylesheet" href="{{ asset('admin/bower_components/select2/dist/css/select2.min.css')}}">

@endsection


@section('content')

{{-- include Error Message --}}
@include('admin.partials._error')


<!-- form start -->
<form role="form" action="{{ route('post.store') }}" method="post" enctype="multipart/form-data">
	{{ csrf_field() }}
    <div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title">Post Create</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="row">
	            <div class="col-md-6">
		              <div class="box-body">
			                <div class="form-group">
			                  <label for="title">Title</label>
			                  <input type="text" name="title" value="{{ old('title') }}" class="form-control" id="title" placeholder="Enter Title">
			                </div>
			                <div class="form-group">
			                  <label for="slug">Slug</label>
			                  <input type="text" name="slug" value="{{ old('slug') }}" class="form-control" id="slug" placeholder="slug">
			                </div>

			              <div class="form-group">
				                <label for="category">Category</label>
				                <select name="category_id" id="category" class="form-control select2"  style="width: 100%;">
				                  	<option ></option>
				                  @foreach ($categories as $category)
				                  	<option value="{{ $category->id }} ">{{ $category->name }} </option>
				                  @endforeach
				                </select>
			              </div>
			              <!-- /.form-group -->
			              <div class="form-group">
				                <label for="tags">Tags</label>
				                <select tabindex="-1" class="form-control select2" id="tags" name="tags[]" multiple="multiple" data-placeholder="Tags"
				                        style="width: 100%;">
				                  @foreach ($tags as $tag)
					                  <option value="{{ $tag->id }}">{{ $tag->name }} </option>
				                  @endforeach
				                </select>
			              </div>
			              <!-- /.form-group -->
		              </div>
		              <!-- /.box-body -->
	            </div>
	            <!-- /.col -->
	            <div class="col-md-6">
			        <div class="form-group">
			        	<label for="image">Image</label>
			            <input type="file" name="image" id="image" accept="image/*" >
			        </div>
	                <div class="checkbox">
			            <label>
			            	<input name="status" value="1" type="checkbox">Publish
			            </label>
				    </div>
	            </div>
	            <!-- /.col -->
          </div>
          <!-- /.row -->
			<div class="box-footer">
				<div class="form-group pull-right">
		 			<a href="{{ route('post.index') }}" class="btn btn-warning">Back</a>
		 			<button type="submit" class="btn btn-primary">Submit</button>
				</div>
		    </div>
        </div>
        <!-- /.box-body -->
    </div>
      <!-- /.box -->




    <div class="row">
        <div class="col-md-12">

          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Body
                <small>Simple and fast</small>
              </h3>
              <!-- tools box -->
              <div class="pull-right box-tools">
                <button type="button" class="btn btn-default btn-sm" data-widget="collapse" data-toggle="tooltip"
                        title="Collapse">
                  <i class="fa fa-minus"></i></button>
              </div>
              <!-- /. tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body pad">
                <textarea id="editor1"  name="body"
                          style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{ old('body') }}</textarea>
            </div>
          </div>
        </div>
        <!-- /.col-->
    </div>
      <!-- ./row -->
</form>

@endsection


{{-- Optional JavaScript --}}
@section('javascript')
  {{-- ckedior --}}
  <script src="{{ asset('admin/ckeditor/ckeditor.js') }}"></script>

  {{-- select  --}}
	<script src="{{ asset('admin/bower_components/select2/dist/js/select2.full.min.js')}}"></script>

  <script>
    $(function(){
        //Initialize Select2 Elements
        $('.select2').select2(); 


        CKEDITOR.replace('editor1');

        $(".textarea").WYSIHTML5();

    });


          $('#title').on('keyup', function() {

          var theTitle = this.value.toLowerCase().trim(),
          slugInput = $('#slug'),
          theSlug = theTitle.replace(/&/g, '-and-')
                 .replace(/[^a-z0-9-]+/g, '-')
                 .replace(/\-\-+/g, '-')
                 .replace(/^-+|-+$/g, '');



          slugInput.val(theSlug);


      });
  </script>

@endsection
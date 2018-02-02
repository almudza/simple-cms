{{-- Post Create --}}

@extends('admin.main')

 {{-- Optional CSS --}}
@section('css')
<link rel="stylesheet" href="{{ asset('admin/bower_components/select2/dist/css/select2.min.css')}}">


{{-- ckeditor --}}
  {{-- ckedior --}}
  <script  type="text/javascript" src="{{ asset('admin/ckeditor/ckeditor.js') }}"></script>

@endsection


@section('content')

{{-- include Error Message --}}
@include('admin.partials._error')


<!-- form start -->
<form role="form" action="{{ route('post.update',$post->id) }}" method="post" enctype="multipart/form-data">
  {{ csrf_field() }}

    <div class="box box-default">
        <div class="box-header text-center with-border">
              <h3 class="box-title">Post Edit : {{ str_limit($post->title, 10) }} </h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="row">
              <div class="col-md-6">
                  <div class="box-body">
                      <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" name="title" class="form-control" id="title" value="{{ $post->title }} ">
                      </div>
                      <div class="form-group">
                        <label for="slug">Slug</label>
                        <input type="text" name="slug" class="form-control" id="slug" value="{{ $post->slug }}">
                      </div>
                    <div class="form-group">
                        <label for="category">Category</label>
                        <select id="category" class="form-control select2" style="width: 100%;" name="category_id">

                          <option ></option>
        
                          @foreach ($categories as $category)
                            
                            <option value="{{ $category->id }} "
                              @if ( $category->id == $post->category_id)
                                selected 
                              @endif

                              >{{ $category->name}} </option>
                          @endforeach
                        </select>
                    </div>
                    <!-- /.form-group -->
                    <div class="form-group">
                        <label for="tags">Tags</label>
                        <select id="tags" name="tags[]" area-hidden="true" class="form-control select2" multiple="" data-placeholder="Select a State"
                                style="width: 100%;">
                          @foreach ($tags as $tag)
                            <option value="{{ $tag->id }}"
                              @foreach ($post->tags as $postTag)
                                @if ($postTag->id == $tag->id)
                                  selected 
                                @endif
                              @endforeach>
                                {{ $tag->name }}
                              </option>
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

                    <div class="parent">
                      <div class="child">
                        <img src="{{ $post->getAdminImage() }}" width="50%" alt="">
                      </div>
                    </div>
                    <br><br>

                    @if (!isset($post->image))
                      <input type="file" name="image" id="image" accept="image/*">
                    @endif     
                </div>
                <div class="checkbox">
                  <label>
                    <input value="1" @if ($post->status == 1) checked @endif name="status" type="checkbox">Publish
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
            <div >
                <textarea id="editor1"  name="body"
                          style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"> {{ $post->body }} </textarea>
            </div>
          </div>
        </div>
        <!-- /.col-->
    </div>
      <!-- ./row -->
</form>

{{-- form delete thumb --}}
<form action="{{ route('deletethumb',$post->id) }}" id="remove-thumb" method="post" style="display: none;">
  {{ csrf_field() }}
  {{ method_field('DELETE') }}
</form>



@endsection


{{-- Optional JavaScript --}}
@section('javascript')
  <script src="{{ asset('admin/bower_components/select2/dist/js/select2.full.min.js')}}"></script>

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
        $('#remove-thumb').submit();
      });

  });
</script>


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
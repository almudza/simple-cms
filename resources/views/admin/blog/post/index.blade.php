{{-- index Posts --}}
@extends('admin.main')


@section('css')

  <!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">

@endsection

@section('content')
      <div class="row">
        <div class="col-xs-12">

          <div class="box">
            <div class="box-header">
              @can('posts.create', Auth::user())
                  
              <a href="{{ route('post.create') }}" class="btn btn-warning">Create</a>

              @endcan
              <h3 class="pull-center box-title">POST LIST</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No.</th>
                  <th>Name</th>
                  <th>Status</th>
                  <th>Image</th>
                  <th>Tags</th>
                  <th>Category</th>
                  <th>Created At</th>
                  @can('posts.update', Auth::user())
                      
                    <th>Edit</th>
                  @endcan

                  @can('posts.delete', Auth::user())
                      
                    <th>Trash</th>
                  @endcan
                </tr>
                </thead>
                <tbody>
                  @foreach ($posts as $post)
                    <tr>
                      <td>
                        {{ $loop->index + 1 }}
                      </td>
                      <td>
                        {{ str_limit($post->title,12) }}
                      </td>
                      <td>
                        @if ( $post->status == 1)
                          <label class="label label-default">Publish</label> 
                        @else 
                          <label class="label label-warning">Draft</label>
                        @endif
                      </td>
                      <td>
                          <img src="{{ $post->getAdminImage() }}" width="90" height="50"> 
                      </td>
                      <td>
                        @foreach ($post->tags as $postTag)
                          @if (count($postTag->name) == 0)
                          null
                            
                          @else
                            <label class="label label-primary">{{ $postTag->name }}</label> 
                          @endif
                        @endforeach
                      </td>
                      <td>
                        @if (isset($post->category->name))
                            <label class="label label-default">{{ $post->category_id }}</label> | <label class="label label-warning"> {{ $post->category->name }}</label>
                        @else
                            null
                        
                        @endif

                         
                        
                      </td>
                      <td>
                        <p>{{ date('M j, Y h:ia', strtotime($post->created_at)) }}</p>
                        {{-- {{ $post->created_at }} --}}
                      </td>
                      @can('posts.update', Auth::user())
                      <td>
                        <a href="{{ route('post.edit',$post->id) }}" class="fa fa-lg fa-edit"></a>
                      </td>
                      @endcan

                      @can('posts.delete', Auth::user())
                      <td>
                        <a href="{{ route('post.trash',$post->id) }}" class="fa fa-lg fa-trash"></a>
                      </td>
                      @endcan
                    </tr>
                  @endforeach
                </tbody>
                <tfoot>
                <tr>
                  <th>Total</th>
                  <th> {{ count($posts) }} </th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
@endsection

@section('javascript')
<script src="{{ asset('admin/bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{ asset('admin/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
<script>
  $(function () {
    $('#example1').DataTable()
  })
</script>
@endsection
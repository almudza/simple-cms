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
              {{-- <a href="{{ route('post.create') }}" class="btn btn-warning">Create</a> --}}
              <h3 class="box-title">Data Table With Full Features</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No.</th>
                  <th>Name</th>
                  <th>Slug</th>
                  <th>Created At</th>
                  <th>Trashed At</th>
                  <th>Restore</th>
                  <th>Delete</th>
                </tr>
                </thead>
                <tbody>
                  @foreach ($posts as $post)
                    <tr>
                      <td>
                        {{ $loop->index + 1 }}
                      </td>
                      <td>
                        {{ $post->title }}
                      </td>
                      <td>
                        {{ $post->slug }}
                      </td>
                      <td>
                        {{ $post->created_at }}
                      </td>
                      <td>
                        {{ $post->deleted_at }}
                      </td>
                      <td><a href="{{ route('post.restore',$post->id) }}" class="fa fa-edit"></a>
                      </td>
                      <td>
                        <form id="kill-form-{{ $post->id }}" action="{{ route('post.kill',$post->id) }}" style="display: none;" >
                          {{ csrf_field() }}
                          
                        </form>

                        <a href="" onclick="
                        if(confirm('Yakin Mau Hapus?')) 
                        {
                          event.preventDefault();
                          document.getElementById('kill-form-{{ $post->id }}').submit();
                        } else {
                          event.preventDefault();
                        }
                        "><span class="fa fa-trash"></span></a>
                      </td>
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
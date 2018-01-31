{{-- index Category --}}
@extends('admin.main')


@section('css')

  <!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">

@endsection

@section('content')
      <div class="row">
        <div class="col-xs-12">

          <div class="box">
            <div class="box-header text-center">
              <a href="{{ route('category.create') }}" class="label label-warning col-md-1">Create</a>
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
                  <th>Opsi</th>
                </tr>
                </thead>
                <tbody>
                  @foreach ($categories as $category)
                    <tr>
                      <td>
                        {{ $loop->index + 1 }}
                      </td>
                      <td>
                        {{ $category->name }}
                      </td>
                      <td>
                        {{ $category->slug }}
                      </td>
                      <td>
                        <form id="delete-form-{{ $category->id }}" method="post" action="{{ route('category.destroy',['id'=>$category->id]) }}">
                          {{ csrf_field() }}
                          {{ method_field('DELETE') }}
                        </form>
                        <a href="{{ route('category.edit',$category->id) }}"><span class="label label-primary">Edit</span></a>| 
                       <a href="" onclick="
                       if (confirm('Are You Sure?..')) {
                        event.preventDefault();
                        document.getElementById('delete-form-{{ $category->id }}').submit();
                       } else {
                        event.preventDefault();
                       }"><span class="label label-danger">Delete</span></a></td>
                    </tr>
                  @endforeach
                </tbody>
                <tfoot>
                <tr>
                  <th>Total</th>
                  <th> {{ count($categories) }} </th>
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
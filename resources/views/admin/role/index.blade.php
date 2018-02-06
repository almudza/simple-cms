{{-- index Role --}}
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
              <a href="{{ route('role.create') }}" class="btn btn-warning">Create</a>
              <h3 class="box-title">Role Create</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No.</th>
                  <th>Name</th>
                  <th>Opsi</th>
                </tr>
                </thead>
                <tbody>

                  @foreach ($roles as $role)
                <tr>
                    
                  <td>{{ $loop->index +1 }} </td>
                  <td>{{ $role->name }} </td>

                  <td>
                    <form method="post" id="delete-form-{{ $role->id }}" action="{{ route('role.destroy',['id'=>$role->id]) }}">
                      {{ csrf_field() }}
                      {{ method_field("DELETE") }}
                    </form>
                    <a href="{{ route('role.edit',$role->id) }}"><span class="label label-warning">Edit</span></a>
                   |
                    <a href="" onclick="if (confirm('Are you Sure???')) {
                      event.preventDefault();
                      document.getElementById('delete-form-{{ $role->id }}').submit();
                    } else {
                      event.preventDefault();
                    } ">Delete</a> 
                 </td>
                </tr>
                  @endforeach
                </tbody>
                <tfoot>
                <tr>
                  <th>Total</th>
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
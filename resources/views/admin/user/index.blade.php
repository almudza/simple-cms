{{-- index user --}}
@extends('admin.main')


@section('css')

  <!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">

@endsection

@section('content')
      <div class="row">
        <div class="col-xs-12">
  @include('admin.partials._error')
          <div class="box">
            <div class="box-header text-center">
              <a href="{{ route('user.create') }}" class="label label-warning col-md-1">Create</a>
              <h3 class="box-title">User</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No.</th>
                  <th>Name</th>
                  <th>Roles</th>
                  <th>Status</th>
                  <th>Opsi</th>
                </tr>
                </thead>
                <tbody>
                  @foreach ($users as $user)
                    <tr>
                      <td>
                        {{ $loop->index + 1 }}
                      </td>
                      <td>
                        {{ $user->name }}
                      </td>

                      <td>
                        @foreach ($user->roles as $role)
                           <span class="badge badge-primary"> {{ $role->name }} </span> 
                          @endforeach  
                      </td>

                      <td>{{ $user->status ? 'Active' : 'Not Active' }} </td>
                      
                      <td>
                        <form id="delete-form-{{ $user->id }}" method="post" action="{{ route('user.destroy',['id'=>$user->id]) }}">
                          {{ csrf_field() }}
                          {{ method_field('DELETE') }}
                        </form>
                        <a href="{{ route('user.edit',$user->id) }}"><span class="label label-primary">Edit</span></a>| 
                       <a href="" onclick="
                       if (confirm('Are You Sure?..')) {
                        event.preventDefault();
                        document.getElementById('delete-form-{{ $user->id }}').submit();
                       } else {
                        event.preventDefault();
                       }"><span class="label label-danger">Delete</span></a></td>
                    </tr>
                  @endforeach
                </tbody>
                <tfoot>
                <tr>
                  <th>Total</th>
                  <th> {{ count($users) }} </th>
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
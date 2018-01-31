<!DOCTYPE html>
<html>
<head>
  {{-- include head --}}
  @include('admin.partials._head')
  {{-- end head --}}

</head>

<body class="hold-transition skin-green sidebar-mini">
<div class="wrapper">

{{-- header section include --}}
  @include('admin.partials._header')
{{-- end header section include --}}

  <!-- Aside Menu Left side column. contains the logo and sidebar -->
    @include('admin.partials._aside')
  {{-- End Aside Menu --}}

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Blank page
        <small>it all starts here</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Examples</a></li>
        <li class="active">Blank page</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
        @yield('content')
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


  {{-- Footer Include --}}
    @include('admin.partials._footer')
  {{-- End Footer include --}}

  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->



  {{-- JavaScript Include --}}
    @include('admin.partials._javascript')
  {{-- End JavaScript Include --}}

</body>
</html>

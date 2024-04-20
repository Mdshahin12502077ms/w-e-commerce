<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | Dashboard</title>
    @include('Backend.includes.style')

</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
     @include('Backend.includes.header')
     @include('Backend.includes.sidebar')
     @yield('content')
     @include('Backend.includes.footer')
          <!-- Control Sidebar -->
          <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->
  @include('Backend.includes.script')
  @stack('script')
</body>

</html>

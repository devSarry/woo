<!DOCTYPE html>
<html>
@include('layouts.header')
@yield('custom-css')
  <body class="skin-blue sidebar-mini">
    <div class="wrapper">
@include('layouts.menu')
      <div class="content-wrapper" style="min-height: 298px;">
        <!-- Content Header (Page header) -->
 			@yield('content')
      </div><!-- /.content-wrapper -->
@include('layouts.footer')
@include('layouts.scripts')
    <!-- Optionally, you can add Slimscroll and FastClick plugins.
         Both of these plugins are recommended to enhance the
         user experience. Slimscroll is required when using the
         fixed layout. -->
@yield('custom-js')
  </body>
</html>
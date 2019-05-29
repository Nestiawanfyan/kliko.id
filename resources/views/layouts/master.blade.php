<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title') | Kliko</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="{{ asset('asset-backend/bower_components/bootstrap/dist/css/bootstrap.min.css') }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('asset-backend/bower_components/font-awesome/css/font-awesome.min.css') }}">
    <!-- Ionicons -->
    <style>
      input[type="search"]{
        margin-left:20px;
        width:70%;
      }
    </style>
    <link rel="stylesheet" href="{{ asset('asset-backend/bower_components/Ionicons/css/ionicons.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('asset-backend/dist/css/AdminLTE.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/css/dropzone.min.css') }}">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
    folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{ asset('asset-backend/dist/css/skins/_all-skins.min.css') }}">
    <!-- Morris chart -->
    <link rel="stylesheet" href="{{ asset('asset-backend/bower_components/morris.js/morris.css') }}">

    <link rel="stylesheet" href="//identity.uchicago.edu/c/fonts/proximanova.css">

    <link rel="stylesheet" href="{{ asset('dist/css/nouislider.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.css">
    <link rel="stylesheet" href="{{ asset('dist/css/nouislider.min.css') }}">

    <!-- jvectormap -->
    <link rel="stylesheet" href="{{ asset('asset-backend/bower_components/jvectormap/jquery-jvectormap.css') }}">
    <!-- Date Picker -->
    <link rel="stylesheet" href="{{ asset('asset-backend/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') }}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{ asset('asset-backend/bower_components/bootstrap-daterangepicker/daterangepicker.css') }}">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="{{ asset('asset-backend/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') }}">

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
 
 
    <!-- jQuery 3 -->
    <script src="{{ asset('asset-backend/bower_components/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('dist\js\dropzone.js') }}"></script>
    <!-- <script src="{{ asset('dist/js/jquery-2.2.4.min.js') }}"></script>
    <script src="{{ asset('dist/js/jquery.form.min.js') }}"></script> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
    <!-- <script src="{{ asset('dist/js/bootstrap.min.js') }}"></script> -->
    <script src="https://maps.google.com/maps/api/js?key=AIzaSyAh7znf86DomKGdnc7LkiHla3XMYWtgoTM&amp;libraries=places&amp;region=id&amp;"></script>


    @yield('style')
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
  @include('backend.header')
  @include('backend.sidebar')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        @yield('title-content')
      </h1>
      <ol class="breadcrumb">
        @yield('breadcrumb')
      </ol>
    </section>

    @yield('main-content')

  </div>
  <!-- /.content-wrapper -->

  @include('includes.footer')
</div>
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
<script src="{{ asset('asset-backend/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('asset-backend/bower_components/raphael/raphael.min.js') }}"></script>
<script src="{{ asset('asset-backend/bower_components/morris.js/morris.min.js') }}"></script>
<script src="{{ asset('asset-backend/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js') }}"></script>
<script src="{{ asset('asset-backend/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') }}"></script>
<script src="{{ asset('asset-backend/plugins/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
<script src="{{ asset('asset-backend/bower_components/jquery-knob/dist/jquery.knob.min.js') }}"></script>
<script src="{{ asset('dist/js/nouislider.min.js') }}"></script>
<script src="{{ asset('dist/js/app.min.js') }}"></script>
<script src="{{ asset('asset-backend/bower_components/moment/min/moment.min.js') }}"></script>
<script src="{{ asset('asset-backend/bower_components/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
<script src="{{ asset('asset-backend/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>
<script src="{{ asset('asset-backend/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') }}"></script>
<script src="{{ asset('asset-backend/bower_components/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
<script src="{{ asset('asset-backend/bower_components/fastclick/lib/fastclick.js') }}"></script>
<script src="{{ asset('asset-backend/dist/js/adminlte.min.js') }}"></script>
<script src="{{ asset('asset-backend/dist/js/pages/dashboard.js') }}"></script>
<script src="{{ asset('asset-backend/dist/js/demo.js') }}"></script>
@yield('script')
</body>
</html>

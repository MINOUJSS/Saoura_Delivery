<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>لوحة تحكم المتجر|{{$title??''}}</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="{{url('admin-css')}}/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{url('admin-css')}}/css/bootstrap-rtl.min.css">
    <link rel="stylesheet" href="{{url('admin-css')}}/css/jquery-jvectormap-1.2.2.css">
    <!--Admin LTE rtl-->
    <link rel="stylesheet" href="{{url('admin-css')}}/css/AdminLTE.min.css">
    <link rel="stylesheet" href="{{url('admin-css')}}/css/AdminLTE-rtl.min.css">    
    <link rel="stylesheet" href="{{url('admin-css')}}/css/_all-skins.min.css">
    <link rel="stylesheet" href="{{url('admin-css')}}/css/_all-skins-rtl.min.css">
    <link rel="stylesheet" href="{{url('admin-css')}}/css/style.css">
    <!--colorpicker-->
    <link rel="stylesheet" href="{{url('colorpicker')}}/bootstrap-colorpicker.min.css">
    {{-- <link rel="stylesheet" href="{{url('colorpicker')}}/bootstrap-colorpicker.css"> --}}
    {{-- <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-colorpicker/2.5.3/css/bootstrap-colorpicker.min.css" rel="stylesheet"> --}}
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Cairo:600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{url('admin-css')}}/css/font-awesome.css">
    <script src="https://kit.fontawesome.com/d227077519.js" crossorigin="anonymous"></script>
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{url('admin-css')}}/dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
          page. However, you can choose any other skin. Make sure you
          apply the skin class to the body tag so the changes take effect.
    -->
    <link rel="stylesheet" href="{{url('admin-css')}}/dist/css/skins/skin-blue.min.css">    
    <!-- sweet alert link-->
    <script src="{{url('vendor')}}/sweetalert/sweetalert.all.js"></script>    
    <!--colorpicker-->
    <script src="{{url('colorpicker')}}/bootstrap-colorpicker.min.js"></script>  

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <!--
  BODY TAG OPTIONS:
  =================
  Apply one or more of the following classes to get the
  desired effect
  |---------------------------------------------------------|
  | SKINS         | skin-blue                               |
  |               | skin-black                              |
  |               | skin-purple                             |
  |               | skin-yellow                             |
  |               | skin-red                                |
  |               | skin-green                              |
  |---------------------------------------------------------|
  |LAYOUT OPTIONS | fixed                                   |
  |               | layout-boxed                            |
  |               | layout-top-nav                          |
  |               | sidebar-collapse                        |
  |               | sidebar-mini                            |
  |---------------------------------------------------------|
  -->
  <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">          
      <!-- Main Header -->
      @yield('header')
      <!-- Left side column. contains the logo and sidebar -->
      @yield('side-bar')

      <!-- Content Wrapper. Contains page content -->
      @yield('content')

      <!-- Main Footer -->
      @yield('main-footer')

      <!-- Control Sidebar -->
      @yield('control-sidebar')
      <!-- Add the sidebar's background. This div must be placed
           immediately after the control sidebar -->
      <div class="control-sidebar-bg"></div>
    </div><!-- ./wrapper -->

    <!-- REQUIRED JS SCRIPTS -->

    <!-- jQuery 2.1.4 -->
    <script src="{{url('admin-css')}}/js/jQuery-2.1.4.min.js"></script>    
    <!-- Bootstrap 3.3.5 -->
    <script src="{{url('admin-css')}}/js/bootstrap.min.js"></script>
    <!-- AdminLTE App -->
    <script src="{{url('admin-css')}}/dist/js/app.min.js"></script>

    <!-- My Functions -->
    <script src="{{url('admin-css')}}/js/My_functions.js"></script>
    <!--ckeditor-->
    <script src="{{ asset('ckeditor/ckeditor.js')}}"></script>
    <script>CKEDITOR.replace('article-ckeditor');</script>    
    <!--colorpicker-->
    {{-- <script src="{{url('colorpicker')}}/bootstrap-colorpicker.min.js"></script> --}}
    {{-- <script src="{{url('colorpicker')}}/bootstrap-colorpicker.js"></script>     --}}
    <script type="text/javascript">

      $('.colorpicker').colorpicker();
    
    </script>
    <!-- Optionally, you can add Slimscroll and FastClick plugins.
         Both of these plugins are recommended to enhance the
         user experience. Slimscroll is required when using the
         fixed layout. --> 
         @include('sweetalert::alert')        
  </body>
</html>

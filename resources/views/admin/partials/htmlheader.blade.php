<head>
    <meta charset="UTF-8">
    <title>Admin - @yield('htmlheader_title', 'Login') </title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <meta name="_token" content="{!! csrf_token() !!}"/>
    <!-- Bootstrap 3.3.4 -->
    {!! Html::style('assets/admin/js/select2/select2.min.css') !!}
    {!! Html::style('assets/admin/js/colorpicker/bootstrap-colorpicker.min.css') !!}
    {!! Html::style('assets/admin/js/daterangepicker/daterangepicker-bs3.css') !!}
    {!! Html::style('assets/admin/js/datepicker/datepicker3.css') !!}
    {!! Html::style('assets/admin/js/bootstrap-tagsinput/bootstrap-tagsinput.css') !!}
    {!! Html::style('assets/admin/js/datatables/dataTables.bootstrap.css') !!}
    {!! Html::style('assets/admin/js/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') !!}
    {!! Html::style('assets/admin/styles/styles.css') !!}
    <!-- Font Awesome Icons -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Ionicons -->
    <link href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet" type="text/css" />
    
</head>

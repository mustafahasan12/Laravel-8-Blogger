<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <title>@yield('title')</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="http://test.laravelblog.com/admin/css/sb-admin-2.min.css" rel="stylesheet">
    <link href="http://test.laravelblog.com/admin/css/style.css" rel="stylesheet">
    <link href="http://test.laravelblog.com/admin/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

            @section('sidebar')
                @include('../admin/sidebar')
            @show 

            @section('topbar')
                @include('../admin/topbar')
            @show 

            @yield('content')

            @section('footer')
                @include('../admin/footer')
            @show 
            
   
    <!-- Bootstrap core JavaScript-->
    <script src="http://test.laravelblog.com/admin/vendor/jquery/jquery.min.js"></script>
    <script src="http://test.laravelblog.com/admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="http://test.laravelblog.com/admin/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="http://test.laravelblog.com/admin/js/sb-admin-2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- <script src="js/vue.js"></script> -->
    <!-- <script src="js/vue.min.js"></script> -->



</body>

</html>

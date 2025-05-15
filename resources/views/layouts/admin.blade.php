<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Hệ thống Admin - @yield('title', 'Quản lý')</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('AdminLTE/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('AdminLTE/dist/css/adminlte.min.css') }}">
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

    <!-- Preloader -->
    <div class="preloader flex-column justify-content-center align-items-center">
        <img class="animation__shake" src="{{ asset('AdminLTE/dist/img/AdminLTELogo.png') }}" alt="AdminLTELogo" height="60" width="60">
    </div>

    @include('partials.admin.sidebar')
    @include('partials.admin.navbar')

    <main class="content-wrapper">
        <div class="content">
            <div class="container-fluid pt-3">
                @yield('content')  <!-- Nội dung động -->
            </div>
        </div>
    </main>

    @include('partials.admin.footer')

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{ asset('AdminLTE/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 5 JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<!-- AdminLTE App -->
<script src="{{ asset('AdminLTE/dist/js/adminlte.min.js') }}"></script>
<!-- SweetAlert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<!-- Laravel AJAX CSRF Setup -->
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    <style>
    .bg-gradient-info { background: linear-gradient(135deg, #17a2b8, #36d1dc); color: white; }
    .bg-gradient-success { background: linear-gradient(135deg, #28a745, #34c759); color: white; }
    .bg-gradient-warning { background: linear-gradient(135deg, #ffc107, #ffca2c); color: white; }
    .bg-gradient-danger { background: linear-gradient(135deg, #dc3545, #e4606d); color: white; }
    .bg-gradient-primary { background: linear-gradient(135deg, #007bff, #4597ff); color: white; }
    .bg-gradient-dark { background: linear-gradient(135deg, #343a40, #4b545c); color: white; }
    .small-box { transition: transform 0.2s; }
    .small-box:hover { transform: translateY(-5px); }
    .card { border-radius: 0.5rem; }
    .list-group-item { border-left: 3px solid transparent; }
    .list-group-item:hover { border-left: 3px solid #007bff; background: #f8f9fa; }
</style>
</script>
@yield('scripts')
</body>
</html>
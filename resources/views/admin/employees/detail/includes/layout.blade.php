<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin</title>
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">
    @yield('style')

</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i
                            class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item">
                    <div class="form-group d-flex">
                        <input name="searchtext" value="" class="form-control mr-1" style="width: 100vh"
                            type="text" placeholder="Tìm kiếm...">
                        <span class="input-group-btn d-flex">
                            <button class="btn btn-default" type="submit" id="addressSearch">
                                <i class="fa fa-search"></i>
                            </button>
                        </span>
                    </div>
                </li>
            </ul>
        </nav>


        <div class="content-wrapper">
            @yield('content')
        </div>
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <div class="sidebar">
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="{{ asset('dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2"
                            alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block">Administrator</a>
                    </div>
                </div>
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <li class="nav-item">
                            <a href="{{ route('employees.information', ['employee' => $employee]) }}" class="nav-link {{ Request::is('/') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    01. Thông tin tổng quan
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('employees.contract', ['employee' => $employee])}}" class="nav-link">
                                <i class="nav-icon fas fa-photo"></i>
                                <p>
                                    02. Hợp đồng
                                </p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('employees.working-process', ['employee' => $employee]) }}" class="nav-link">
                                <i class="nav-icon fa fa-address-book"></i>
                                <p>
                                    03. Quá trình làm việc
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('employees.salary-process', ['employee' => $employee]) }}" class="nav-link">
                                <i class="nav-icon fa fa-archive"></i>
                                <p>
                                    04. Diễn biến lương
                                </p>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>



        <footer class="main-footer">
            <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
            All rights reserved.
            <div class="float-right d-none d-sm-inline-block">
                <b>Version</b> 3.2.0
            </div>
        </footer>
    </div>
    <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('dist/js/adminlte.js') }}"></script>
    <script src="{{ asset('dist/js/pages/dashboard3.js') }}"></script>

    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>
    @yield('script')
</body>

</html>

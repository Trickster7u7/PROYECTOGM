<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <base href="{{ \URL::to('/') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css">
    @yield('dataTable')
    <title>Sistema para gimnacio</title>
</head>
<style>
.fa,
.fas,
.fa {
    font-size: .9rem !important;
}

body {
    position: relative;
}

.dataTables_wrapper .dataTables_length {
    margin-left: 20px !important;
    margin-top: 10px !important;
}

.dataTables_wrapper .dataTables_filter,
.dataTables_wrapper .dataTables_info,
.dataTables_wrapper .dataTables_paginate {
    margin: 10px 20px !important;
}

@media (min-width: 768px) {

    body:not(.sidebar-mini-md):not(.sidebar-mini-xs):not(.layout-top-nav) .content-wrapper,
    body:not(.sidebar-mini-md):not(.sidebar-mini-xs):not(.layout-top-nav) .main-footer,
    body:not(.sidebar-mini-md):not(.sidebar-mini-xs):not(.layout-top-nav) .main-header {
        margin-left: 200px;
    }
}
</style>
@yield('stripeStyle')

<body class="sidebar-collapse">
    <!-- Preloader -->
    <div class="preloader flex-column justify-content-center align-items-center">
        <img class="animation__shake" src="imgs/gym-logo.png" alt="GymSystemLogo" height="150" width="150">
    </div>
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light" style="font-size: 14px;">
        
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            @role('admin|cityManager|gymManager')
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button" id="asideIcon"><i
                        class="fas fa-bars"></i></a>
            </li>
            @endrole
            <li class="nav-item" style="font-size: 30px; margin-top: -10px; color: black;">
                <a href="#" class="nav-link">Inicio</a>
            </li>
            <li class="nav-item">
            <img class="animation__shake" src="imgs/gym-logo.png" alt="GymSystemLogo" height="40" width="40">
            </li>

            <!--
            <li class="nav-item d-none d-sm-inline-block">
                <a href="#" class="nav-link">Contact</a>
            </li>-->
        </ul>

        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">
            <li class="dropdown user user-menu" style="cursor:pointer;">
                <div class="media align-items-center">
                    <img src="{{asset(auth()->user()->profileImageFile)}}" alt="User Avatar"
                        class="mr-2 mt-1 img-size-32 img-circle mr-2">
                    <div class="media-body">
                        <h6 class="dropdown-item-title text-white" style="font-size: 14px">
                            {{ auth()->user()->name }}
                        </h6>
                    </div>
                </div>
                <ul class="dropdown-menu" style="width:200px">
                    <li class="user-header mb-1" style="height: 140px;">
                        <img class="profile-user-img img-fluid img-circle"
                            src="{{asset(auth()->user()->profileImageFile)}}" alt="User profile picture">
                        <p class="mb-0">
                            {{ auth()->user()->name }}
                        </p>
                    </li>
                    <li class="user-footer d-flex justify-content-between">
                        <div class="pull-left">
                            <a href="{{ route('user.admin_profile', auth()->user()->id) }}"
                                class="btn btn-default btn-flat">Prerfil</a>
                        </div>
                        <div class="pull-right">
                            <a href="{{ route('logout') }}" class="btn btn-default btn-flat" onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">Cerrar Sesion</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                </ul>
            </li>

        </ul>
    </nav>
    <!-- /.navbar -->
    <!-- Main Sidebar Container -->
    @role('admin|cityManager|gymManager')

    <aside class="main-sidebar sidebar-dark-primary elevation-4" style="font-size: 14px;width: 200px;">

            <!-- Brand Logo -->
            <a href="{{ route('welcome') }}" class="brand-link px-2">
                <span class="brand-text font-weight-light px-4">GymRat</span>
            </a>
            <!-- Sidebar -->.
            <div class="sidebar" >
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex" >
                    <div class="image">
                        <img src="{{ asset(auth()->user()->profileImageFile) }}" class="img-circle elevation-2"
                            alt="User Image">
                    </div>
                    <div class="info">
                        <a href="{{ route('user.admin_profile', auth()->user()->id) }}" class="d-block">
                            {{ auth()->user()->name }}
                        </a>
                    </div>
                </div>
            </div>
            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                    data-accordion="false">
                    @role('admin|cityManager|gymManager')
                    {{-- # ======================================= # Revenue # ======================================= # --}}
                    <li class="nav-item">
                        <a href="/" class="nav-link">
                            <i class="nav-icon fas fa-dollar-sign"></i>
                            <p>Ingresos</p>
                        </a>
                    </li>
                    @endrole
                    {{-- # ======================================= # Cities # ======================================= # --}}
                    @role('admin')
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-city"></i>
                            <p> Ciudades
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('city.list') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p> Todas las ciudades </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('city.create') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p> Nueva ciudad </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('city.showDeleted') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p> Papelera </p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    {{-- # ======================================= # City Managers # ======================================= # --}}
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-user-tie"></i>
                            <p> Gerente de ciudad<i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('cityManager.list') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p> todos gerentes de la ciudad </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('cityManager.create') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p> Nuevo </p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    @endrole
                    {{-- # ======================================= # Gyms # ======================================= # --}}
                    @role('admin|cityManager')
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-dumbbell"></i>
                            <p> Gimnacios
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="/gym/list" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p> Lista de Gimnacios </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/gym/create" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p> Nuevo </p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    {{-- # ======================================= # Gym Managers # ======================================= # --}}
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-user"></i>
                            <p> Administrador de Gimnacio
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="gymManager/list" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p> Todos los Administradores </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="gymManager/create" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p> Nuevo </p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    @endrole
                    {{-- # ======================================= # Coaches # ======================================= # --}}
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-user-ninja"></i>
                            <p> Coaches
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="coach/list" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p> Todos los coaches </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="coach/create" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p> Nuevo </p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    {{-- # ======================================= # Users # ======================================= # --}}
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-users"></i>
                            <p> Usuarios
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="/allUsers/list" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p> Todos los usuarios </p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    {{-- # ======================================= # Training Packages # ======================================= # --}}
                    <li class="nav-item">
                        <a href="/" class="nav-link">
                            <i class="nav-icon fas fa-cubes"></i>
                            <p> Paquetes de entrenamiento
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('trainingPackeges.listPackeges') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p> lista de paquetes </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('trainingPackeges.creatPackege') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p> Nuevo </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('PaymentPackage.stripe') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p> Comprar paquete </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('PaymentPackage.purchase_history') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p> Compras </p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    {{-- # ======================================= # Training Session # ======================================= # --}}
                    <li class="nav-item">
                        <a href="pages/kanban.html" class="nav-link">
                            <i class="nav-icon fas fa-cube"></i>
                            <p> Sesion de entrenamiento
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('TrainingSessions.listSessions') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p> Todas las sesiones </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('TrainingSessions.training_session') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p> Nueva </p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    {{-- # ======================================= # Attendance # ======================================= # --}}
                    <li class="nav-item">
                        <a href="/listHistory" class="nav-link">
                            <i class="nav-icon fas fa-book"></i>
                            <p> Asistencia </p>
                            </p>
                        </a>
                        </a>
                    </li>
                    {{-- # ======================================= # Banned Users # ======================================= # --}}
                    <li class="nav-item">
                        <a href="{{ route('user.listBanned') }}" class="nav-link">
                            <i class="nav-icon fa fa-user-lock"></i>
                            <p> Usuarios Baneados </p>
                        </a>
                    </li>
                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>
    @endrole
    @yield('content')
    <div id="sidebar-overlay"></div>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <footer class="main-footer d-flex justify-content-center" style="font-size:13px;">
        <span>Copyright &copy; 2022-2023 <span class="bg-primary px-2 py-1">GymRat.</span></span> Todos los derechos reservados para trickstertut.
    </footer>
    <!-- jQuery -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="plugins/jquery-ui/jquery-ui.min.js"></script>
    <script>
    $.widget.bridge('uibutton', $.ui.button)
    </script>
    <script src="plugins/sparklines/sparkline.js"></script>
    <script src="plugins/moment/moment.min.js"></script>
    <script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <script src="plugins/daterangepicker/daterangepicker.js"></script>
    <script src="dist/js/adminlte.js"></script>
    <script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
    <script src="plugins/summernote/summernote-bs4.min.js"></script>
    <!-- DataTables  & Plugins -->
    <script src="../../plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="../../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="../../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="../../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="../../plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="../../plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="../../plugins/jszip/jszip.min.js"></script>
    <script src="../../plugins/pdfmake/pdfmake.min.js"></script>
    <script src="../../plugins/pdfmake/vfs_fonts.js"></script>
    <script src="../../plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="../../plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="../../plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
    <script src="dist/js/main.js"></script>
    <script>
    $(function() {
        $("#proj").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#proj_wrapper .col-md-6:eq(0)');
    });
    </script>
    @yield('dataTableScript')
</body>
@yield('stripeScript')

</html>

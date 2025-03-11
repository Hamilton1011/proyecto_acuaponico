<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="{{ asset('images/Favicon2.png')}}" type="image/x-icon">
    <title>Bienvenido</title>
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="{{ asset('AdminLTE-3.2.0/https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback') }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('AdminLTE-3.2.0/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('AdminLTE-3.2.0/dist/css/adminlte.min.css') }}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ asset('AdminLTE-3.2.0/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">

    <script src="{{ asset('js/app.js') }}" defer></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
        </ul>

        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    {{ Auth::user()->name }}
                </a>

                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                        {{ __('Cerrar Sesiòn') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </li>
        </ul>
    </nav>
    <aside class="main-sidebar sidebar-success-green elevation-4">
        <div class="sidebar">
            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                    data-accordion="false">
                    <br><br><br><br>

                    <!-- visualizacion de actividades -->
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link text-success">
                            <i class="fas fa-tasks"></i> &nbsp;
                            <p>
                                Actividades
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <i class="nav-icon fas fa-eye"></i>
                                <p>Visualización</p>
                            </li>
                        </ul>
                    </li>

                    <!-- gestion de produccion -->
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link text-success">
                            <i class="fas fa-clipboard-list"></i>&nbsp;
                            <p>
                                Gestión de registros
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ asset('AdminLTE-3.2.0/pages/UI/general.html') }}" class="nav-link text-dark">
                                    <i class="nav-icon fas fa-leaf"></i>
                                    <p>Plantas</p>
                                    <i class="fas fa-angle-left right"></i>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <i class="nav-icon fas fa-seedling"></i>
                                        <p>Registro de siembra</p>
                                    </li>
                                    <li class="nav-item">
                                        <a href="" class="nav-link text-danger">
                                            <i class="nav-icon fas fa-list"></i>
                                            <p>Lista de registros</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a href="{{ asset('AdminLTE-3.2.0/pages/UI/icons.html') }}" class="nav-link text-dark">
                                    <i class="nav-icon fas fa-fish"></i>
                                    <p>Peces</p>
                                    <i class="fas fa-angle-left right"></i>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <i class="nav-icon fas fa-plus-circle"></i>
                                        <p>Registro de ingreso</p>
                                    </li>
                                    <li class="nav-item">
                                        <i class="nav-icon fas fa-list-ul"></i>
                                        <p>Lista de registros</p>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>

                    <!-- registro de seguimiento -->
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link text-success">
                            <i class="fas fa-search-location"></i> &nbsp;
                            <p>
                                Seguimiento
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <i class="nav-icon fas fa-pen"></i>
                                <p>Registro</p>
                            </li>
                        </ul>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <i class="nav-icon fas fa-list"></i>
                                <p>Lista</p>
                            </li>
                        </ul>
                    </li>

                    <!-- Registros de cosechas -->
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link text-success">
                            <i class="fas fa-tractor"></i> &nbsp;
                            <p>
                                Registros de cosechas
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <i class="nav-icon fas fa-file-signature"></i>
                                <p>Registro de cosecha</p>
                            </li>
                        </ul>
                    </li>
                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>
    <center>
        <div class="content-wrapper">
            @yield('content')
        </div>
    </center>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="{{ asset('AdminLTE-3.2.0/plugins/jquery/jquery.min.js') }}"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="{{ asset('AdminLTE-3.2.0/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('AdminLTE-3.2.0/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- overlayScrollbars -->
    <script src="{{ asset('AdminLTE-3.2.0/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('AdminLTE-3.2.0/dist/js/adminlte.js') }}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{ asset('AdminLTE-3.2.0/dist/js/demo.js') }}"></script>
</body>

</html>
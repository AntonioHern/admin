<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Administración</title>

    <!-- Scripts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/bootstrap.js') }}"></script>
    <script src="{{asset('dist/js/adminlte.js')}}"></script>
    <script src="https://kit.fontawesome.com/bfc42573e2.js" crossorigin="anonymous"></script>
    <script src="{{asset('js/myJs.js')}}"></script>

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <!-- Styles -->
    <link href="{{ asset('dist/css/adminlte.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{asset('css/estilo.css')}}" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div id="app">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
                </li>
            </ul>

            <!-- SEARCH FORM -->
            <form class="form-inline ml-3">
                <div class="input-group input-group-sm">
                    <input class="form-control form-control-navbar" type="search" name="search" placeholder="Search"
                           aria-label="Search">
                    <div class="input-group-append">
                        <button class="btn btn-navbar" type="submit">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
            </form>
            <!-- Right navbar links -->

            <ul class="navbar-nav ml-auto">
                <li><a href="/" class="mr-4 link-black">Enviar mensaje</a></li>
                <?php use App\Mensaje;use App\Paciente;use App\User;
                $mensajes_count = Mensaje::where('receptor_id', '=', auth()->id())->count();?>
                <li><a href="{{route('mensajes.index',auth()->id())}}" class="mr-4 link-black">Notificaciones <span
                            class="badge badge-warning">{{$mensajes_count}}</span> </a></li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="{{ url('/') }}" class="brand-link">
                <img src="{{asset('dist/img/ampy.jpg')}}" alt="Ampy Logo" class="brand-image img-circle elevation-5"
                     style="opacity: .8">
                <span class="brand-text font-weight-light">Ampy System</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        @if(Auth::user()->foto==='null')
                            <img src="{{asset('imagenes/1583006635shutterstock-421316998_bg.jpg')}}"
                                 class="img-circle elevation-2" alt="Imagen">
                        @else
                            <img src="{{asset('imagenes/'.Auth::user()->foto)}}" class="img-circle elevation-2"
                                 alt="Imagen">
                        @endif
                    </div>
                    <div class="info">
                        <a href="#" class="d-block">
                            @guest
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Iniciar Sesión') }}</a>
                            @else
                                {{ Auth::user()->name }}
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                           document.getElementById('logout-form').submit();">
                                    Cerrar Sesión
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                      style="display: none;">
                                    @csrf
                                </form>

                            @endguest
                        </a>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">

                        <li class="nav-item">
                            <a href="/" class="{{ Request::path() === '/' ? 'nav-link active' : 'nav-link' }}">
                                <i class="nav-icon fas fa-home"></i>
                                <p>Inicio</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{url('usuarios')}}"
                               class="{{ Request::path() === 'usuarios' ? 'nav-link active' : 'nav-link' }}">
                                <i class="nav-icon fas fa-users"></i>
                                <p>
                                    Personal
                                    <?php  $users_count = User::all()->count(); ?>
                                    <span class="right badge badge-danger">{{ $users_count ?? '0' }}</span>
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{url('pacientes')}}"
                               class="{{ Request::path() === 'pacientes' ? 'nav-link active' : 'nav-link' }}">
                                <i class="nav-icon fas fa-users"></i>
                                <p>
                                    Pacientes
                                    <?php  $paciente_count = Paciente::all()->count(); ?>
                                    <span class="right badge badge-danger">{{ $paciente_count ?? '0' }}</span>
                                </p>
                            </a>
                        </li>


                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link">
                                <i class="nav-icon far fa-sticky-note"></i>
                                <p>Tratamientos<i class="fas fa-angle-left right"></i></p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{url('/listarStock')}}"
                                       class="{{ Request::path() === 'notas/todas' ? 'nav-link active' : 'nav-link' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Todos</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{url('/stockBajo')}}"
                                       class="{{ Request::path() === 'notas/favoritas' ? 'nav-link active' : 'nav-link' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Stock Bajo</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{url('/ultimosTratamientos')}}"
                                       class="{{ Request::path() === 'notas/archivadas' ? 'nav-link active' : 'nav-link' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Ultimos Tratamientos</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{url('/recetas')}}"
                                       class="{{ Request::path() === 'notas/archivadas' ? 'nav-link active' : 'nav-link' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Recetas</p>
                                    </a>
                                </li>
                            </ul>
                        </li>

                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->

        <div class="content-wrapper">
            <!-- Main content -->
            @yield('content')
            @include('sweetalert::alert')
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <!-- /.content-wrapper -->

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
        <div class="p-3">
            <h5>Title</h5>
            <p>Sidebar content</p>
        </div>
    </aside>
    <!-- /.control-sidebar -->

    <!-- Main Footer -->
    <footer class="main-footer">
        <!-- To the right -->

        <!-- Default to the left -->
        <strong>Copyright &copy; 2014-2019 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
    </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->

</body>
</html>

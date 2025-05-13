<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de ACOPIO</title>
    <link rel="shortcut icon" href="{{ asset('AdminLTE/dist/img/icon.png') }}" type="image/x-icon">


    <!-- Google Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@300;400;600;700&display=swap">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('AdminLTE/plugins/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">


    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ asset('AdminLTE/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">

    <!-- AdminLTE -->
    <link rel="stylesheet" href="{{ asset('AdminLTE/dist/css/adminlte.min.css') }}">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">

    <!-- Bootstrap jQuery -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>

    <!-- Estilos personalizados -->
    <style>
        .brand-link {
            background-color: #f4f6f9 !important;
        }

        .brand-text {
            font-weight: bold;
            font-size: 1.2rem;
            color: #28a745;
        }

        .main-header {
            background-color: #198754 !important;
        }

        .main-header .nav-link {
            color: #ffffff !important;
        }

        .main-sidebar {
            background-color: #ffffff;
        }

       

        .nav-sidebar .nav-link:hover {
            background-color: #e9f5ee;
        }

        .user-panel span {
            font-weight: bold;
            color: #198754;
        }

        .content-wrapper {
            background-color: #f8f9fa;
            padding: 1.5rem;
        }

        .dropdown-menu {
            min-width: 10rem;
        }

        .dropdown-item i {
            margin-right: 5px;
        }
    </style>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        @if(session('success'))
            Swal.fire({
                title: '¡Éxito!',
                text: '{{ session('success') }}',
                icon: 'success',
                confirmButtonText: 'Aceptar'
            });
        @endif
    
        @if(session('error'))
            Swal.fire({
                title: 'Error',
                text: '{{ session('error') }}',
                icon: 'error',
                confirmButtonText: 'Intentar de nuevo'
            });
        @endif
    
        @if(session('info'))
            Swal.fire({
                title: 'Información',
                text: '{{ session('info') }}',
                icon: 'info',
                confirmButtonText: 'Entendido'
            });
        @endif
    </script>
    
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__wobble" src="{{ asset('images/images.png') }}" alt="Logo Agrosoft" height="100" width="150">
        </div>

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand">
            <!-- Toggle Sidebar -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button">
                        <i class="fas fa-bars text-white"></i>
                    </a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="#" class="nav-link">Inicio</a>
                </li>
            </ul>

            <!-- Right Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- User Menu -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">
                        <i class="fas fa-user-circle text-white"></i> {{ Auth::user()->name }}
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="fas fa-sign-out-alt text-danger"></i> Cerrar Sesión
                            </a>
                        </li>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </ul>
                </li>
            </ul>
        </nav>

        <!-- Sidebar -->
        <aside class="main-sidebar sidebar-light-primary elevation-4">
            <!-- Logo -->
            <a href="#" class="brand-link text-center" style="text-decoration: none;">
                <img src="{{ asset('AdminLTE/dist/img/sena.png') }}" alt="Logo" class="brand-image img-circle elevation-3">
                <span class="brand-text fs-6">CENTRO ACOPIO CEFA</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Panel -->
                <div class="user-panel mt-3 pb-3 mb-3 text-center">
                    <span>Panel Administrador</span>
                </div>

                <!-- Menu -->
                <nav>
                    <ul class="nav nav-pills nav-sidebar flex-column" role="menu" data-widget="treeview" data-accordion="false">
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fa-solid fa-trash-arrow-up" style="color: #198754"></i>
                                <p class="text-success">Reciclaje</p>
                                <i class="fas fa-angle-right right" style="color: #198754"></i>
                              
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                <a href="{{ route('acopi.admin.material.create') }}" class="nav-link text-dark">
                                        <i class="nav-icon fas fa-edit"></i>
                                        <p>Ingreso</p>
                                    </a>
                                </li>
    
                                <li class="nav-item">
                                    <a href="" class="nav-link text-dark">
                                        <i class="nav-icon fas fa-clipboard-list"></i>
                                        <p>Listas</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-calendar-check"  style="color: #198754"></i>
                                <p  class="text-success">Solicitudes</p>
                                <i class="fas fa-angle-right right" style="color: #198754"></i>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="" class="nav-link text-dark">
                                        <i class="nav-icon fas fa-edit"></i>
                                        <p>Ingreso</p>
                                    </a>
                                </li>
    
                                <li class="nav-item">
                                    <a href="" class="nav-link text-dark">
                                        <i class="nav-icon fas fa-clipboard-list"></i>
                                        <p>Listas</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-tools" style="color: #198754"></i>
                                <p  class="text-success">Herramientas</p>
                                <i class="fas fa-angle-right right" style="color: #198754"></i>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="" class="nav-link text-dark">
                                        <i class="nav-icon fas fa-edit"></i>
                                        <p>Ingreso</p>
                                    </a>
                                </li>
    
                                <li class="nav-item">
                                    <a href="" class="nav-link text-dark">
                                        <i class="nav-icon fas fa-clipboard-list"></i>
                                        <p>Listas</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>

        <!-- Contenido -->
        <div class="content-wrapper">
            @yield('content')
        </div>

        <!-- Sidebar de control (opcional) -->
        <aside class="control-sidebar control-sidebar-dark"></aside>

    </div>

    <!-- Scripts -->
    <script src="{{ asset('AdminLTE/plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('AdminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('AdminLTE/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
    <script src="{{ asset('AdminLTE/dist/js/adminlte.min.js') }}"></script>
</body>

</html>
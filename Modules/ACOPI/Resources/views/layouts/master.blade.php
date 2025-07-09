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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"></script>

    <style>
        .brand-link { background-color: #f4f6f9 !important; }
        .brand-text { font-weight: bold; font-size: 1.2rem; color: #28a745; }
        .main-header { background-color: #198754 !important; }
        .main-header .nav-link { color: #ffffff !important; }
        .main-sidebar { background-color: #ffffff; }
        .nav-sidebar .nav-link:hover { background-color: #e9f5ee; }
        .user-panel span { font-weight: bold; color: #198754; }
        .content-wrapper { background-color: #f8f9fa; padding: 1.5rem; }
        .dropdown-menu { min-width: 10rem; }
        .dropdown-item i { margin-right: 5px; }
    </style>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        @if(session('success'))
            Swal.fire({ title: '¡Éxito!', text: '{{ session('success') }}', icon: 'success', confirmButtonText: 'Aceptar' });
        @endif
        @if(session('error'))
            Swal.fire({ title: 'Error', text: '{{ session('error') }}', icon: 'error', confirmButtonText: 'Intentar de nuevo' });
        @endif
        @if(session('info'))
            Swal.fire({ title: 'Información', text: '{{ session('info') }}', icon: 'info', confirmButtonText: 'Entendido' });
        @endif
    </script>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

    <!-- Preloader -->
    <div class="preloader d-flex flex-column justify-content-center align-items-center" style="background-color: #ffffff;">
        <div class="spinner-border text-success" role="status" style="width: 4rem; height: 4rem;"></div>
        <img src="{{ asset('images/images.png') }}" alt="Logo Agrosoft" height="80" class="mt-3 animate__animated animate__pulse animate__infinite">
        <p class="mt-2 text-success fw-bold">Cargando sistema...</p>
    </div>

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars text-white"></i></a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="{{ route('acopi.admin.welcome') }}" class="nav-link">Inicio</a>
            </li>
        </ul>

        <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">
                    <i class="fas fa-user-circle text-white"></i> {{ Auth::check() ? Auth::user()->name : '' }}
                <ul class="dropdown-menu dropdown-menu-end">
                    <li>
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="fas fa-sign-out-alt text-danger"></i> Cerrar Sesión
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">@csrf</form>
                    </li>
                </ul>
            </li>
        </ul>
    </nav>

    <!-- Sidebar -->
    <aside class="main-sidebar sidebar-light-primary elevation-4">
        <a href="#" class="brand-link text-center">
            <img src="{{ asset('AdminLTE/dist/img/sena.png') }}" alt="Logo" class="brand-image img-circle elevation-3">
            <span class="brand-text fs-6">CENTRO ACOPIO CEFA</span>
        </a>

        <div class="sidebar">
            <div class="user-panel mt-3 pb-3 mb-3 text-center">
                <span>Panel Administrador</span>
            </div>

            <nav>
                <ul class="nav nav-pills nav-sidebar flex-column" role="menu" data-widget="treeview" data-accordion="false">
                    <!-- Material -->
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fa-solid fa-trash-arrow-up text-success"></i>
                            <p class="text-success">Material</p>
                            <i class="fas fa-angle-right right text-success"></i>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('acopi.admin.material.create') }}" class="nav-link text-dark">
                                    <i class="nav-icon fas fa-edit"></i>
                                    <p>Ingreso</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('acopi.admin.material.listas') }}" class="nav-link text-dark">
                                    <i class="nav-icon fas fa-clipboard-list"></i>
                                    <p>Listas</p>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <!-- Bodega -->
                    <li class="nav-item">
                        <a href="{{ route('acopi.admin.cellar.index') }}" class="nav-link">
                            <i class="nav-icon fas fa-warehouse text-success"></i>
                            <p class="text-success">Bodegas</p>
                        </a>
                    </li>

                    <!-- Movimientos -->
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-exchange-alt text-success"></i>
                            <p class="text-success">Movimientos</p>
                        </a>
                    </li>

                    <!-- Pasante -->
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-user-graduate text-success"></i>
                            <p class="text-success">Pasante</p>
                        </a>
                    </li>

                    <!-- Actividades -->
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-tools text-success"></i>
                            <p class="text-success">Actividades</p>
                            <i class="fas fa-angle-right right text-success"></i>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="#" class="nav-link text-dark">
                                    <i class="nav-icon fas fa-edit"></i>
                                    <p>Ingreso</p>
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
        @yield('content2')
    </div>

    <aside class="control-sidebar control-sidebar-dark"></aside>
</div>

<!-- Scripts -->
<script src="{{ asset('AdminLTE/plugins/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('AdminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('AdminLTE/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
<script src="{{ asset('AdminLTE/dist/js/adminlte.min.js') }}"></script>
</body>
</html>

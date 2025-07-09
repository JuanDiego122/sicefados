<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" href="{{ asset('AdminLTE/dist/img/icon.png') }}" type="image/x-icon">
  <title>Centro de Acopio - @yield('title')</title>

  <!-- Google Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('AdminLTE/plugins/fontawesome-free/css/all.min.css') }}">

  <!-- Estilos adicionales -->
  <link rel="stylesheet" href="{{ asset('AdminLTE/dist/css/adminlte.min.css') }}">

  <style>
    body {
      background: #f8f9fb;
      font-family: 'Source Sans Pro', sans-serif;
    }
  </style>
</head>

<body>
  <!-- Header fijo -->
  <header style="background: #124905; color: #fff; padding: 10px 30px;">
    <div style="display: flex; align-items: center; justify-content: space-between;">
      <div>
        <img src="{{ asset('AdminLTE/dist/img/icon.png') }}" style="height: 40px;" alt="Logo">
        <strong style="margin-left: 10px;">Centro de Acopio</strong>
      </div>
      <nav>
        <a href="{{ route('login') }}" style="color: white; margin-right: 20px;">Ingresar</a>
        @auth
          @if(checkRol('acopi.admin'))
            <a href="{{ route('acopi.admin.welcome') }}" style="color: white;">Panel Admin</a>
          @endif
        @endauth
      </nav>
    </div>
  </header>

  <!-- Contenido dinámico -->
  <main class="container mt-4">
    @yield('content')
  </main>

  <!-- Scripts -->
  <script src="{{ asset('AdminLTE/plugins/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('AdminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('AdminLTE/dist/js/adminlte.min.js') }}"></script>
</body>

</html>

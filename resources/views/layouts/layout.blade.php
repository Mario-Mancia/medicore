<!DOCTYPE html>
<html lang="es" data-bs-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- Token CSRF disponible para el futuro AJAX de formularios --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('titulo', 'Sistema de Inventario')</title>

    {{-- ACÁ VAMOS A METER TODAS LAS REFERENCIAS A LOS ESTILOS --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    @stack('estilos')
</head>
<body class="layout-fixed sidebar-expand-lg bg-body-tertiary">
<div class="app-wrapper">

    {{--@include('menus.menu_admin') --}}

    <aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark">
        <div class="sidebar-wrapper" style="overflow-x: hidden !important;">
        </div>
    </aside>

    <main class="container-fluid px-4 pb-5">
        @yield('contenido')
    </main>

    <footer class="app-footer">
        <strong>Copyright &copy; 2026.</strong>
        All rights reserved.
        <div class="float-end d-none d-sm-inline-block">
           {{-- <b>Versión</b> 1.0 | <a href="{{ url('Home/acerca') }}"  class="text-decoration-none">Acerca de</a> --}}
        </div>
    </footer>
</div>

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
@stack('scripts')
</body>
</html>

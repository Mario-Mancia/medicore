<!DOCTYPE html>
<html lang="es" data-bs-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- Token CSRF disponible para el futuro AJAX de formularios --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('titulo', 'Sistema de Inventario')</title>

    {{-- ACÁ VAMOS A METER TODAS LAS REFERENCIAS A LOS ESTILOS --}}
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

@stack('scripts')
</body>
</html>

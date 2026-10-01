<!doctype html>
<html lang="es" data-bs-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('titulo', 'Inicio de sesión')</title>

    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/appstyle.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    @stack('estilos')
</head>
<body style="background-color: var(--md-sys-color-surface-variant); color: var(--md-sys-color-on-surface-variant);">

<main class="container-fluid px-0">
    @yield('contenido')
</main>

</body>
</html>

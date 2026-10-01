
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <script>
        const tema = window.matchMedia(
            '(prefers-color-scheme: dark)'
        ).matches ? 'dark' : 'light';

        document.documentElement.setAttribute(
            'data-bs-theme',
            tema
        );
    </script>

    <title>@yield('titulo', 'Sistema médico')</title>

    {{-- Bootstrap --}}
    <link rel="stylesheet"
          href="{{ asset('bootstrap/css/bootstrap.min.css') }}">

    {{-- Estilos globales del CSS --}}
    <link rel="stylesheet"
          href="{{ asset('css/appstyle.css') }}">

    {{-- Iconos de Bootstrap --}}
    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    {{-- Estilos particulares de cada vista --}}
    @stack('estilos')
</head>

<body>

<div class="app-wrapper d-flex flex-column min-vh-100">

    {{-- TOPBAR --}}
    <header class="app-header navbar navbar-expand-lg shadow-sm py-2">

        <div class="container-fluid px-4">

            <a class="app-brand navbar-brand fw-bold"
               href="{{ route('home') }}">

                <i class="bi bi-hospital me-2"></i>
                MediCore

            </a>

            <div class="ms-auto d-flex align-items-center">

                <div class="dropdown">

                    <a href="#"
                       class="app-user-menu d-flex align-items-center
                              text-decoration-none dropdown-toggle
                              rounded-pill p-2"
                       id="userMenu"
                       data-bs-toggle="dropdown"
                       aria-expanded="false">

                        <i class="bi bi-person-circle fs-5 mx-1"></i>

                        <span class="mx-2 fw-medium">
                            {{ Auth::user()->nombres ?? 'Administrador' }}
                        </span>

                    </a>

                    <ul class="dropdown-menu dropdown-menu-end
                               shadow border-0 rounded-4 mt-2"
                        aria-labelledby="userMenu">

                        <li>
                            <form action="{{ route('logout') }}"
                                  method="POST">

                                @csrf

                                <button type="submit"
                                        class="dropdown-item d-flex
                                               align-items-center
                                               rounded-3 px-3">

                                    <i class="bi bi-box-arrow-right
                                              me-2 text-danger"></i>

                                    Cerrar sesión

                                </button>

                            </form>
                        </li>

                    </ul>

                </div>

            </div>

        </div>

    </header>


    {{-- CONTENIDO PRINCIPAL --}}
    <div class="d-flex flex-grow-1">

        {{--
        <aside class="app-sidebar shadow-sm">
            Menú lateral
        </aside>
        --}}

        <main class="container-fluid px-4 pb-5 pt-4 flex-grow-1">

            @yield('contenido')

        </main>

    </div>


    {{-- FOOTER --}}
    <footer class="app-footer py-3 shadow-sm mt-auto">

        <div class="container-fluid px-4 d-flex
                    justify-content-between align-items-center">

            <span class="small fw-medium">
                Copyright &copy; 2026. All rights reserved.
            </span>

            <span class="small">
                Sistema Médico MD3
            </span>

        </div>

    </footer>

</div>


{{-- TOASTS --}}
@include('layouts.toast')


{{-- JAVASCRIPT --}}
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

<script src="{{ asset('bootstrap/js/bootstrap.bundle.min.js') }}"></script>

<script src="{{ asset('js/toast.js') }}"></script>

{{-- Scripts particulares de cada vista --}}
@stack('scripts')

</body>
</html>

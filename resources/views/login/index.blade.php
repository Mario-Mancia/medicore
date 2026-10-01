@extends('layouts.guestlayout')

@section('contenido')
    <div class="min-vh-100 d-flex align-items-center justify-content-center px-3" style="background-color: var(--md-sys-color-background);">

        <div class="col-12 col-sm-10 col-md-8 col-lg-5 col-xl-4">
            <div class="card border-0 shadow-lg rounded-5 overflow-hidden" style="background-color: var(--md-sys-color-surface);">

                <div class="card-body p-5">

                    <div class="text-center mb-4">
                        <div class="mb-3 d-inline-flex p-3 rounded-circle" style="background-color: var(--md-sys-color-primary-container);">
                            <i class="bi bi-hospital fs-1" style="color: var(--md-sys-color-primary);"></i>
                        </div>
                        <h1 class="h4 fw-bold" style="color: var(--md-sys-color-on-surface);">Bienvenido</h1>
                        <p class="text-muted small">Ingresa tus credenciales para acceder al sistema</p>
                    </div>

                    @if(session('error'))
                        <div class="alert border-0 rounded-4" style="background-color: var(--md-sys-color-error-container); color: var(--md-sys-color-on-error-container);">
                            <i class="bi bi-exclamation-octagon-fill me-2"></i> {{ session('error') }}
                        </div>
                    @endif
                    @if(session('warning'))
                        <div class="alert border-0 rounded-4" style="background-color: var(--md-sys-color-tertiary-container); color: var(--md-sys-color-on-tertiary-container);">
                            <i class="bi bi-exclamation-triangle-fill me-2"></i> {{ session('warning') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('login') }}" novalidate>
                        @csrf

                        <div class="mb-4">
                            <label for="correo" class="form-label fw-medium small">Correo electrónico</label>
                            <div class="input-group">
                            <span class="input-group-text border-0 rounded-start-4" style="background-color: var(--md-sys-color-surface-variant);">
                                <i class="bi bi-envelope"></i>
                            </span>
                                <input type="email" id="correo" name="correo" class="form-control border-0 rounded-end-4 @error('correo') is-invalid @enderror" value="{{ old('correo') }}" placeholder="correo@ejemplo.com" style="background-color: var(--md-sys-color-surface-variant);" required>
                                @error('correo')
                                <div class="invalid-feedback ps-2">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-4">
                            <div class="d-flex justify-content-between align-items-center mb-1">
                                <label for="contrasenha" class="form-label fw-medium small mb-0">Contraseña</label>
                            </div>
                            <div class="input-group">
                            <span class="input-group-text border-0 rounded-start-4" style="background-color: var(--md-sys-color-surface-variant);">
                                <i class="bi bi-lock"></i>
                            </span>
                                <input type="password" id="contrasenha" name="contrasenha" class="form-control border-0 rounded-end-4 @error('contrasenha') is-invalid @enderror" placeholder="••••••••" style="background-color: var(--md-sys-color-surface-variant);" required>
                                @error('contrasenha')
                                <div class="invalid-feedback ps-2">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-4 form-check">
                            <!-- OJO: Aquí se cambia a "remember" para que Auth::attempt() funcione correctamente -->
                            <input type="checkbox" class="form-check-input shadow-none" id="remember" name="remember" value="1">
                            <label class="form-check-label small" for="remember">Mantener sesión iniciada</label>
                        </div>

                        <div class="d-grid mt-2">
                            <button type="submit" class="btn py-2 rounded-pill fw-bold shadow-sm" style="background-color: var(--md-sys-color-primary); color: var(--md-sys-color-on-primary);">
                                Iniciar Sesión
                            </button>
                        </div>
                    </form>

                </div>
            </div>

            <div class="text-center mt-4">
                <p class="small fw-medium" style="color: var(--md-sys-color-outline);">
                    Sistema de Administración Médica
                </p>
            </div>
        </div>
    </div>
@endsection

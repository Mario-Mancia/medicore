<div class="toast-container position-fixed bottom-0 end-0 p-4" style="z-index: 1056;">

    @foreach (['success', 'error', 'warning', 'info'] as $msgType)
        @if(session($msgType))
            @php
                $bg = ''; $color = ''; $icon = ''; $title = '';
                switch($msgType) {
                    case 'success':
                        $bg = 'var(--md-sys-color-primary-container)';
                        $color = 'var(--md-sys-color-on-primary-container)';
                        $icon = 'bi bi-check-circle-fill text-primary';
                        $title = 'Éxito';
                        break;
                    case 'error':
                        $bg = 'var(--md-sys-color-error-container)';
                        $color = 'var(--md-sys-color-on-error-container)';
                        $icon = 'bi bi-x-circle-fill text-danger';
                        $title = 'Error';
                        break;
                    case 'warning':
                        $bg = 'var(--md-sys-color-tertiary-container)';
                        $color = 'var(--md-sys-color-on-tertiary-container)';
                        $icon = 'bi bi-exclamation-triangle-fill text-warning';
                        $title = 'Advertencia';
                        break;
                    case 'info':
                        $bg = 'var(--md-sys-color-secondary-container)';
                        $color = 'var(--md-sys-color-on-secondary-container)';
                        $icon = 'bi bi-info-circle-fill text-info';
                        $title = 'Información';
                        break;
                }
            @endphp

            <div class="toast border-0 rounded-4 shadow" role="alert" aria-live="assertive" aria-atomic="true" style="background-color: {{ $bg }}; color: {{ $color }}; width: 350px;">
                <div class="toast-header border-0 rounded-top-4 bg-transparent d-flex align-items-center pb-0">
                    <i class="{{ $icon }} fs-5 me-2"></i>
                    <strong class="me-auto">{{ $title }}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Cerrar"></button>
                </div>
                <div class="toast-body fw-medium pt-2 pb-3 px-3">
                    {{ session($msgType) }}
                </div>
            </div>
        @endif
    @endforeach

    @if ($errors->any())
        <div class="toast border-0 rounded-4 shadow" role="alert" aria-live="assertive" aria-atomic="true" style="background-color: var(--md-sys-color-error-container); color: var(--md-sys-color-on-error-container); width: 350px;">
            <div class="toast-header border-0 rounded-top-4 bg-transparent pb-0">
                <i class="bi bi-x-circle-fill fs-5 me-2" style="color: var(--md-sys-color-error);"></i>
                <strong class="me-auto">Error de validación</strong>
                <button type="button" class="btn-close" data-bs-dismiss="toast"></button>
            </div>
            <div class="toast-body fw-medium pt-2 pb-3 px-3">
                <ul class="mb-0 ps-3">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    @endif
</div>

@extends('layouts.layout')

@section('titulo', 'Usuarios')

@push('estilos')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.8/css/dataTables.bootstrap5.min.css">
@endpush

@section('contenido')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h4 mb-0 fw-bold" style="color: var(--md-sys-color-on-background);">
            <i class="bi bi-people-fill me-2" style="color: var(--md-sys-color-primary);"></i>
            Usuarios del sistema
        </h1>

        <button type="button" class="btn rounded-pill fw-medium px-4 shadow-sm" data-bs-toggle="modal" data-bs-target="#modalNuevoUsuario" style="background-color: var(--md-sys-color-primary); color: var(--md-sys-color-on-primary);">
            <i class="bi bi-plus-lg me-1"></i> Nuevo usuario
        </button>
    </div>

    <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
        <div class="card-body p-0">
            <div class="table-responsive p-4">

                <table id="tbl" class="table table-hover align-middle mb-0">

                    <thead class="md3-table-header">
                    <tr>
                        <th class="border-0 pb-3">#</th>
                        <th class="border-0 pb-3">Nombres</th>
                        <th class="border-0 pb-3">Apellidos</th>
                        <th class="border-0 pb-3">Correo</th>
                        <th class="border-0 pb-3">Rol</th>
                        <th class="border-0 pb-3">Estado</th>
                        <th class="border-0 pb-3 text-center">Acciones</th>
                    </tr>
                    </thead>

                    <tbody class="border-top-0">

                    @foreach($usuarios as $u)
                        <tr>
                            <td class="text-body-secondary fw-light">
                                {{ $u->id_usuario }}
                            </td>

                            <td class="fw-medium">
                                {{ $u->nombres }}
                            </td>

                            <td class="fw-medium">
                                {{ $u->apellidos }}
                            </td>

                            <td>
                                {{ $u->correo }}
                            </td>

                            <td>
                    <span class="badge rounded-pill fw-normal px-3 md3-badge-secondary">
                        {{ $u->rol->rol ?? 'N/A' }}
                    </span>
                            </td>

                            <td>
                    <span class="badge rounded-pill fw-normal px-3 md3-badge-primary">
                        {{ $u->estado->estado ?? 'N/A' }}
                    </span>
                            </td>

                            {{-- ACCIONES --}}
                            <td>
                                <div class="d-flex justify-content-center gap-2">

                                    {{-- MODIFICAR --}}
                                    <button type="button"
                                            class="btn btn-sm btn-outline-primary rounded-pill px-3"
                                            data-bs-toggle="modal"
                                            data-bs-target="#modalModificarUsuario{{ $u->id_usuario }}"
                                            title="Modificar usuario">

                                        <i class="bi bi-pencil-square"></i>

                                    </button>

                                    {{-- ELIMINAR --}}
                                    <button type="button"
                                            class="btn btn-sm btn-outline-danger rounded-pill px-3"
                                            data-bs-toggle="modal"
                                            data-bs-target="#modalEliminarUsuario{{ $u->id_usuario }}"
                                            title="Eliminar usuario">

                                        <i class="bi bi-trash3"></i>

                                    </button>

                                </div>
                            </td>

                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    {{-- Modal: Nuevo usuario --}}
    <div class="modal fade" id="modalNuevoUsuario" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content border-0 shadow-lg rounded-5" style="background-color: var(--md-sys-color-surface);">

                <div class="modal-header border-0 pt-4 px-4 pb-2">
                    <h5 class="modal-title fw-bold" style="color: var(--md-sys-color-on-surface);">
                        <i class="bi bi-person-plus-fill me-2" style="color: var(--md-sys-color-primary);"></i> Registrar usuario
                    </h5>
                    <button type="button" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                </div>

                <!-- OJO: Aquí se enlaza a la ruta para que guarde -->
                <form method="POST" action="{{ route('usuarios.insertar') }}">
                    @csrf
                    <div class="modal-body px-4">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label for="id_rol" class="form-label small fw-medium">Rol</label>
                                <select name="id_rol" id="id_rol" class="form-select rounded-3 bg-body-tertiary border-0" required>
                                    <option value="">Seleccione un rol</option>
                                    @foreach($roles ?? [] as $rol)
                                        <option value="{{ $rol->id_rol }}">{{ $rol->rol }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-6">
                                <label for="id_estado" class="form-label small fw-medium">Estado</label>
                                <select name="id_estado" id="id_estado" class="form-select rounded-3 bg-body-tertiary border-0" required>
                                    <option value="">Seleccione un estado</option>
                                    @foreach($estados ?? [] as $estado)
                                        <option value="{{ $estado->id_estado }}">{{ $estado->estado }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-6">
                                <label for="nombres" class="form-label small fw-medium">Nombres</label>
                                <input type="text" name="nombres" class="form-control rounded-3 bg-body-tertiary border-0" maxlength="100" required>
                            </div>

                            <div class="col-md-6">
                                <label for="apellidos" class="form-label small fw-medium">Apellidos</label>
                                <input type="text" name="apellidos" class="form-control rounded-3 bg-body-tertiary border-0" maxlength="100" required>
                            </div>

                            <div class="col-md-6">
                                <label for="correo" class="form-label small fw-medium">Correo electrónico</label>
                                <input type="email" name="correo" class="form-control rounded-3 bg-body-tertiary border-0" maxlength="150" required>
                            </div>

                            <div class="col-md-6">
                                <label for="telefono" class="form-label small fw-medium">Teléfono</label>
                                <input type="tel" name="telefono" class="form-control rounded-3 bg-body-tertiary border-0" maxlength="25">
                            </div>

                            <div class="col-md-6">
                                <label for="contrasenha" class="form-label small fw-medium">Contraseña</label>
                                <input type="password" name="contrasenha" class="form-control rounded-3 bg-body-tertiary border-0" maxlength="250" required>
                            </div>

                            <div class="col-md-6">
                                <label for="contrasenha_confirmation" class="form-label small fw-medium">Confirmar contraseña</label>
                                <input type="password" name="contrasenha_confirmation" class="form-control rounded-3 bg-body-tertiary border-0" maxlength="250" required>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer border-0 px-4 pb-4 pt-2">
                        <button type="button" class="btn rounded-pill px-4 fw-medium text-muted" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn rounded-pill px-4 fw-medium shadow-sm" style="background-color: var(--md-sys-color-primary); color: var(--md-sys-color-on-primary);">
                            Guardar usuario
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- Modal para actualizar usuario --}}
    @foreach($usuarios as $u)

        <div class="modal fade"
             id="modalModificarUsuario{{ $u->id_usuario }}"
             tabindex="-1"
             aria-labelledby="tituloModificar{{ $u->id_usuario }}"
             aria-hidden="true">

            <div class="modal-dialog modal-lg modal-dialog-centered">

                <div class="modal-content md3-surface border-0 shadow-lg rounded-5">

                    {{-- HEADER --}}
                    <div class="modal-header border-0 pt-4 px-4 pb-2">

                        <h5 class="modal-title fw-bold"
                            id="tituloModificar{{ $u->id_usuario }}">

                            <i class="bi bi-pencil-square me-2 text-primary"></i>

                            Modificar usuario #{{ $u->id_usuario }}

                        </h5>

                        <button type="button"
                                class="btn-close shadow-none"
                                data-bs-dismiss="modal"
                                aria-label="Cerrar">
                        </button>

                    </div>


                    {{-- FORMULARIO --}}
                    <form method="POST"
                          action="{{ route('usuarios.actualizar', $u->id_usuario) }}">

                        @csrf
                        @method('PUT')

                        <div class="modal-body px-4">

                            <div class="row g-3">

                                {{-- ROL --}}
                                <div class="col-md-6">

                                    <label for="id_rol_{{ $u->id_usuario }}"
                                           class="form-label small fw-medium">

                                        Rol

                                    </label>

                                    <select name="id_rol"
                                            id="id_rol_{{ $u->id_usuario }}"
                                            class="form-select rounded-3"
                                            required>

                                        <option value="">
                                            Seleccione un rol
                                        </option>

                                        @foreach($roles as $rol)

                                            <option value="{{ $rol->id_rol }}"
                                                {{ $u->id_rol == $rol->id_rol ? 'selected' : '' }}>

                                                {{ $rol->rol }}

                                            </option>

                                        @endforeach

                                    </select>

                                </div>


                                {{-- ESTADO --}}
                                <div class="col-md-6">

                                    <label for="id_estado_{{ $u->id_usuario }}"
                                           class="form-label small fw-medium">

                                        Estado

                                    </label>

                                    <select name="id_estado"
                                            id="id_estado_{{ $u->id_usuario }}"
                                            class="form-select rounded-3"
                                            required>

                                        <option value="">
                                            Seleccione un estado
                                        </option>

                                        @foreach($estados as $estado)

                                            <option value="{{ $estado->id_estado }}"
                                                {{ $u->id_estado == $estado->id_estado ? 'selected' : '' }}>

                                                {{ $estado->estado }}

                                            </option>

                                        @endforeach

                                    </select>

                                </div>


                                {{-- NOMBRES --}}
                                <div class="col-md-6">

                                    <label for="nombres_{{ $u->id_usuario }}"
                                           class="form-label small fw-medium">

                                        Nombres

                                    </label>

                                    <input type="text"
                                           name="nombres"
                                           id="nombres_{{ $u->id_usuario }}"
                                           class="form-control rounded-3"
                                           maxlength="100"
                                           value="{{ $u->nombres }}"
                                           required>

                                </div>


                                {{-- APELLIDOS --}}
                                <div class="col-md-6">

                                    <label for="apellidos_{{ $u->id_usuario }}"
                                           class="form-label small fw-medium">

                                        Apellidos

                                    </label>

                                    <input type="text"
                                           name="apellidos"
                                           id="apellidos_{{ $u->id_usuario }}"
                                           class="form-control rounded-3"
                                           maxlength="100"
                                           value="{{ $u->apellidos }}"
                                           required>

                                </div>


                                {{-- CORREO --}}
                                <div class="col-md-6">

                                    <label for="correo_{{ $u->id_usuario }}"
                                           class="form-label small fw-medium">

                                        Correo electrónico

                                    </label>

                                    <input type="email"
                                           name="correo"
                                           id="correo_{{ $u->id_usuario }}"
                                           class="form-control rounded-3"
                                           maxlength="150"
                                           value="{{ $u->correo }}"
                                           required>

                                </div>


                                {{-- TELÉFONO --}}
                                <div class="col-md-6">

                                    <label for="telefono_{{ $u->id_usuario }}"
                                           class="form-label small fw-medium">

                                        Teléfono

                                    </label>

                                    <input type="tel"
                                           name="telefono"
                                           id="telefono_{{ $u->id_usuario }}"
                                           class="form-control rounded-3"
                                           maxlength="25"
                                           value="{{ $u->telefono }}">

                                </div>


                                {{-- CONTRASEÑA --}}
                                <div class="col-md-6">

                                    <label for="contrasenha_{{ $u->id_usuario }}"
                                           class="form-label small fw-medium">

                                        Nueva contraseña

                                    </label>

                                    <input type="password"
                                           name="contrasenha"
                                           id="contrasenha_{{ $u->id_usuario }}"
                                           class="form-control rounded-3"
                                           maxlength="250"
                                           autocomplete="new-password">

                                    <div class="form-text">
                                        Dejar en blanco para conservar la contraseña actual.
                                    </div>

                                </div>


                                {{-- CONFIRMAR CONTRASEÑA --}}
                                <div class="col-md-6">

                                    <label for="confirmacion_{{ $u->id_usuario }}"
                                           class="form-label small fw-medium">

                                        Confirmar contraseña

                                    </label>

                                    <input type="password"
                                           name="contrasenha_confirmation"
                                           id="confirmacion_{{ $u->id_usuario }}"
                                           class="form-control rounded-3"
                                           maxlength="250"
                                           autocomplete="new-password">

                                </div>

                            </div>

                        </div>


                        {{-- FOOTER --}}
                        <div class="modal-footer border-0 px-4 pb-4 pt-2">

                            <button type="button"
                                    class="btn btn-outline-secondary rounded-pill px-4 fw-medium"
                                    data-bs-dismiss="modal">

                                Cancelar

                            </button>

                            <button type="submit"
                                    class="btn btn-primary rounded-pill px-4 fw-medium shadow-sm">

                                <i class="bi bi-check-lg me-1"></i>

                                Guardar cambios

                            </button>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    @endforeach

    {{-- Modal de eliminar usuario --}}
    @foreach($usuarios as $u)

        <div class="modal fade"
             id="modalEliminarUsuario{{ $u->id_usuario }}"
             tabindex="-1"
             aria-labelledby="tituloEliminar{{ $u->id_usuario }}"
             aria-hidden="true">

            <div class="modal-dialog modal-dialog-centered">

                <div class="modal-content md3-surface border-0 shadow-lg rounded-5">

                    {{-- HEADER --}}
                    <div class="modal-header border-0 pt-4 px-4 pb-2">

                        <h5 class="modal-title fw-bold"
                            id="tituloEliminar{{ $u->id_usuario }}">

                            <i class="bi bi-exclamation-triangle-fill me-2 text-danger"></i>

                            Eliminar usuario

                        </h5>

                        <button type="button"
                                class="btn-close shadow-none"
                                data-bs-dismiss="modal"
                                aria-label="Cerrar">
                        </button>

                    </div>


                    {{-- FORMULARIO --}}
                    <form method="POST"
                          action="{{ route('usuarios.eliminar', $u->id_usuario) }}">

                        @csrf
                        @method('DELETE')

                        <div class="modal-body px-4">

                            <p class="mb-3">
                                ¿Estás seguro de que deseas eliminar este usuario?
                            </p>

                            {{-- INFORMACIÓN DEL USUARIO --}}
                            <div class="md3-surface-variant rounded-4 p-3 mb-3">

                                <div class="d-flex align-items-center gap-3">

                                    <i class="bi bi-person-circle fs-2"></i>

                                    <div>

                                        <div class="fw-bold">
                                            {{ $u->nombres }} {{ $u->apellidos }}
                                        </div>

                                        <div class="small">
                                            {{ $u->correo }}
                                        </div>

                                        <div class="small mt-1">
                                            ID: {{ $u->id_usuario }}
                                        </div>

                                    </div>

                                </div>

                            </div>

                            <div class="alert alert-danger rounded-4 mb-0">

                                <i class="bi bi-exclamation-circle me-2"></i>

                                Esta acción eliminará el usuario seleccionado.

                            </div>

                        </div>


                        {{-- FOOTER --}}
                        <div class="modal-footer border-0 px-4 pb-4 pt-2">

                            <button type="button"
                                    class="btn btn-outline-secondary rounded-pill px-4 fw-medium"
                                    data-bs-dismiss="modal">

                                Cancelar

                            </button>

                            <button type="submit"
                                    class="btn btn-danger rounded-pill px-4 fw-medium shadow-sm">

                                <i class="bi bi-trash3 me-1"></i>

                                Eliminar usuario

                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach

@endsection



@push('scripts')
    <script src="https://cdn.datatables.net/1.13.8/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.8/js/dataTables.bootstrap5.min.js"></script>
    {{-- <script src="{{asset('js/dataTable.js')}}"></script> --}}
@endpush

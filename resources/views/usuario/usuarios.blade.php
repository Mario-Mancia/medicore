@extends('layouts.layout')

@section('titulo', 'Usuarios')

@push('estilos')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.8/css/dataTables.bootstrap5.min.css">

@endpush
@section('contenido')
    <div class="d-flex justify-content-between align-items-center my-4">
        <h1 class="h3 mb-0"><i class="bi bi-box-seam text-primary"></i>Usuarios del sistema</h1>
        <button type="button" id="btnNuevoProducto" class="btn btn-primary">
            <i class="bi bi-plus-lg"></i> Nuevo usuario
        </button>
    </div>
    <div class="card shadow-sm">
        <div class="card-body">
            <table id="tbl" class="table table-hover table-striped align">
                <thead class="table-dark">
                <tr>
                    <th style="width: 3rem;">#</th>
                    <th>Nombres</th>
                    <th>Apellidos</th>
                    <th>Correo</th>
                    <th>Roles</th>
                    <th>Estado</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($usuarios as $u)
                        <tr>
                            <td class="text-muted">{{ $u-> id_usuario }}</td>
                            <td>
                                <span class="fw-semibold">{{ $u -> nombres}}</span>
                            </td>
                            <td>
                                <span class="fw-semibold">{{ $u -> apellidos}}</span>
                            </td>
                            <td>{{ $u -> correo }}</td>
                            <td>{{ $u -> rol-> rol }}</td>
                            <td>{{ $u -> estado -> estado }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="{{asset('js/dataTable.js')}}"></script>
    <script src="https://cdn.datatables.net/1.13.8/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.8/js/dataTables.bootstrap5.min.js"></script>
@endpush

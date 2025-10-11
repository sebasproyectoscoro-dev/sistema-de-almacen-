@extends('adminlte::page')


@section('content_header')
    <nav aria-label="breadcrumb" style="font-size: 15pt">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/admin') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ url('/admin/categorias') }}">Categorias</a></li>
            <li class="breadcrumb-item active" aria-current="page">Listado de categorias</li>
        </ol>
    </nav>
@stop

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title"><b>Ambientes registrados</b></h3>

                    <div class="card-tools">
                        <a class="btn btn-primary" href="{{ url('/admin/ambientes/create') }}">Crear Nuevo</a>
                    </div>
                </div>

                <div class="card-body" style="display: block;">

                    <table id="example1" class="table table-striped table-bordered table-hover table-sm">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Tipo de ambiente</th>
                                <th>Descripción</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($ambientes as $ambiente)
                                <tr>
                                    <td>{{ $ambiente->id }}</td>
                                    <td>{{ $ambiente->nombre }}</td>
                                    <td>{{ $ambiente->tipo_ambiente }}</td>
                                    <td>{{ $ambiente->descripcion }}</td>
                                    <td>
                                        <!-- Botón Editar -->
                                        <a class="btn btn-info"
                                            href="{{ url('/admin/ambientes/' . $ambiente->id . '/edit') }}">
                                            Editar
                                        </a>

                                        <!-- Botón Eliminar -->
                                        <form id="form-borrar-{{ $ambiente->id }}"
                                            action="{{ url('/admin/ambientes/' . $ambiente->id) }}" method="POST"
                                            style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <input type="hidden" name="accion" id="accion-{{ $ambiente->id }}">
                                            <button type="button" class="btn btn-danger"
                                                onclick="confirmarAccion({{ $ambiente->id }})">
                                                Borrar
                                            </button>
                                        </form>

                                        <!-- Botón Ver -->
                                        <a href="{{ url('/admin/ambientes/' . $ambiente->id) }}">
                                            <button type="button" class="btn btn-success">
                                                <i class="fas fa-eye"></i> Ver
                                            </button>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>

@stop



@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}

    <style>
        /* Fondo transparente y sin borde en el contenedor */
        #example1_wrapper .dt-buttons {
            background-color: transparent;
            box-shadow: none;
            border: none;
            display: flex;
            justify-content: center;
            /* Centrar los botones */
            gap: 10px;
            /* Espaciado entre botones */
            margin-bottom: 15px;
            /* Separar botones de la tabla */
        }

        /* Estilo personalizado para los botones */
        #example1_wrapper .btn {
            color: #fff;
            /* Color del texto en blanco */
            border-radius: 4px;
            /* Bordes redondeados */
            padding: 5px 15px;
            /* Espaciado interno */
            font-size: 14px;
            /* TamaÃ±o de fuente */
        }

        /* Colores por tipo de botÃ³n */
        .btn-danger {
            background-color: #dc3545;
            border: none;
        }

        .btn-success {
            background-color: #28a745;
            border: none;
        }

        .btn-info {
            background-color: #17a2b8;
            border: none;
        }

        .btn-warning {
            background-color: #ffc107;
            color: #212529;
            border: none;
        }

        .btn-default {
            background-color: #6e7176;
            color: #212529;
            border: none;
        }
    </style>

@stop

@section('js')

    <script>
        $(function() {
            $("#example1").DataTable({
                "pageLength": 5,
                "language": {
                    "emptyTable": "No hay informaciÃ³n",
                    "info": "Mostrando _START_ a _END_ de _TOTAL_ Estudiantes",
                    "infoEmpty": "Mostrando 0 a 0 de 0 Estudiantes",
                    "infoFiltered": "(Filtrado de _MAX_ total Estudiantes)",
                    "lengthMenu": "Mostrar _MENU_ Estudiantes",
                    "loadingRecords": "Cargando...",
                    "processing": "Procesando...",
                    "search": "Buscador:",
                    "zeroRecords": "Sin resultados encontrados",
                    "paginate": {
                        "first": "Primero",
                        "last": "Ãšltimo",
                        "next": "Siguiente",
                        "previous": "Anterior"
                    }
                },
                "responsive": true,
                "lengthChange": true,
                "autoWidth": false,
                buttons: [{
                        text: '<i class="fas fa-copy"></i> COPIAR',
                        extend: 'copy',
                        className: 'btn btn-default'
                    },
                    {
                        text: '<i class="fas fa-file-pdf"></i> PDF',
                        extend: 'pdf',
                        className: 'btn btn-danger'
                    },
                    {
                        text: '<i class="fas fa-file-csv"></i> CSV',
                        extend: 'csv',
                        className: 'btn btn-info'
                    },
                    {
                        text: '<i class="fas fa-file-excel"></i> EXCEL',
                        extend: 'excel',
                        className: 'btn btn-success'
                    },
                    {
                        text: '<i class="fas fa-print"></i> IMPRIMIR',
                        extend: 'print',
                        className: 'btn btn-warning'
                    }
                ]
            }).buttons().container().appendTo('#example1_wrapper .row:eq(0)');
        });



        function confirmarAccion(id) {
            Swal.fire({
                title: '¿Qué deseas hacer con esta categoría?',
                showDenyButton: true,
                showCancelButton: true,
                confirmButtonText: 'Eliminar',
                denyButtonText: 'Cambiar estado',
                cancelButtonText: 'Cancelar',
                icon: 'question'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Elegido: Eliminar
                    document.getElementById('accion-' + id).value = 'eliminar';
                    document.getElementById('form-borrar-' + id).submit();
                } else if (result.isDenied) {
                    // Elegido: Cambiar estado
                    document.getElementById('accion-' + id).value = 'cambiar_estado';
                    document.getElementById('form-borrar-' + id).submit();
                }
                // Cancelado: no hacer nada
            });
        }
    </script>

@stop

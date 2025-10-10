@extends('adminlte::page')


@section('content_header')
    <nav aria-label="breadcrumb" style="font-size: 15pt">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/admin') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ url('/admin/productos') }}">Productos</a></li>
            <li class="breadcrumb-item active" aria-current="page">Listado de productos</li>
        </ol>
    </nav>
@stop

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title"><b>Productos registrados</b></h3>

                    <div class="card-tools">
                        <a class="btn btn-primary" href="{{ url('/admin/productos/create') }}">Crear Nuevo</a>
                    </div>
                    <!-- /.card-tools -->
                </div>
                <!-- /.card-header -->
                <div class="card-body  table-responsive" style="display: block;">

                    <table id="example1" class="table table-striped table-bordered table-hover table-sm">
                        <thead>
                            <tr>
                                <th>Id</th>
                                 <th>Codigo</th>
                                <th>Nombre</th>
                                 <th>Serial</th>
                                <th>Imagen</th>
                                <th>Categoria</th>
                                <th>Descripcion</th>
                                 <th>Estado</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($productos as $producto)
                                <tr>
                                    <td>{{ $producto->id }}</td>
                                    <td>{{ $producto->codigo }}</td>
                                    <td>{{ $producto->nombre }}</td>
                                     <td>003435354SNDF</td>
                                    <td>
                                        @if ($producto->imagen)
                                            <img src="{{ asset('storage') . '/' . $producto->imagen }}" alt="Imagen del producto"
                                                style="max-width: 50px; max-height: 50px;">
                                            
                                        @else
                                         <span class="text-muted">No existe imagen</span>
                                            
                                        @endif
                                    </td>
                                    <td>{{ $producto->categoria->nombre }}</td>
                                    <td>{!! $producto->descripcion !!}</td>
                <td>
    @if ($producto->estado == 1)
        <span class="badge bg-success">
            <i class="fas fa-check-circle"></i> Activo
        </span>
    @else
        <span class="badge bg-danger">
            <i class="fas fa-times-circle"></i> Inactivo
        </span>
    @endif
</td>

                                    <td>
                                        <a class="btn btn-info"
                                            href="{{ url('/admin/productos/' . $producto->id . '/edit') }}">Editar</a>


                                        <form id="form-borrar-{{ $producto->id }}"
                                            action="{{ url('/admin/productos/' . $producto->id) }}" method="POST"
                                            style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <input type="hidden" name="accion" id="accion-{{ $producto->id }}">
                                            <button type="button" class="btn btn-danger"
                                                onclick="confirmarAccion({{ $producto->id }}, {{ $producto->estado }})">
                                                Borrar
                                            </button>
                                        </form>


                                        <a href="{{ url('/admin/productos/' . $producto->id) }}">
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
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
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




    

function confirmarAccion(id, estado) {
    // Configurar texto y color según el estado actual
    let textoAccion = (estado == 1) ? 'Inactivar' : 'Activar';
    let colorAccion = (estado == 1) ? '#d33' : '#28a745'; // rojo si activo, verde si inactivo

    Swal.fire({
        title: '¿Qué deseas hacer con este producto?',
        icon: 'question',
        showDenyButton: true,
        showCancelButton: true,
        confirmButtonText: 'Eliminar',
        denyButtonText: textoAccion,
        cancelButtonText: 'Cancelar',
        confirmButtonColor: '#3085d6', // azul para eliminar
        denyButtonColor: colorAccion,  // cambia según el estado
        cancelButtonColor: '#6c757d',  // gris
    }).then((result) => {
        if (result.isConfirmed) {
            // Acción: Eliminar
            document.getElementById('accion-' + id).value = 'eliminar';
            document.getElementById('form-borrar-' + id).submit();
        } else if (result.isDenied) {
            // Acción: Activar o Inactivar
            document.getElementById('accion-' + id).value = 'cambiar_estado';
            document.getElementById('form-borrar-' + id).submit();
        }
    });
}



    </script>
@stop

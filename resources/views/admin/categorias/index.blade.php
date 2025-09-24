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
                    <h3 class="card-title"><b>Categorias registrados</b></h3>

                    <div class="card-tools">
                        <a class="btn btn-primary" href="{{ url('/admin/categorias/create') }}">Crear Nuevo</a>
                    </div>
                    <!-- /.card-tools -->
                </div>
                <!-- /.card-header -->
                <div class="card-body" style="display: block;">

                    <table class="table table-striped table-bordered table-hover"   >
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Nombre</th>
                                <th>Descripcion</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                           
                              @foreach (  $categorias as $categoria )
                                <tr>
                              <td>{{ $categoria->id }}</td>
                                <td>{{ $categoria->nombre }}</td>
                                <td>{{ $categoria->descripcion }}</td>
                                <td>
                                    <a class="btn btn-info" href="{{ url('/admin/categorias/'.$categoria->id.'/edit') }}">Editar</a>
                                    <form action="{{ url('/admin/categorias/'.$categoria->id) }}" method="post" style="display:inline">
                                        @csrf
                                        {{ method_field('DELETE') }}
                                        <input class="btn btn-danger" type="submit" onclick="return confirm('¿Quieres borrar?')" value="Borrar">
                                    </form>
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
@stop

@section('js')
    <script>
        console.log("Hi, I'm using the Laravel-AdminLTE package!");
    </script>
@stop

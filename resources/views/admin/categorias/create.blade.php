@extends('adminlte::page')


@section('content_header')
    <nav aria-label="breadcrumb" style="font-size: 15pt">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/admin') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ url('/admin/categorias') }}">Categorias</a></li>
            <li class="breadcrumb-item active" aria-current="page">Creado de categorias</li>
        </ol>
    </nav>
@stop


@section('content')

    <div class="row">
        <div class="col-md-4">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title"><b>Ingrese datos</b></h3>
                    <!-- /.card-tools -->
                </div>
                <!-- /.card-header -->
                <div class="card-body" style="display: block;">

                    <form action="" method="post">

                        @csrf
                        <div class="form-group">
                            <label for="nombre">Nombre</label>
                            <input type="text" class="form-control" name="nombre" id="nombre"
                                aria-describedby="helpId" placeholder="" value="{{ old('nombre') }}">
                            <small id="helpId" class="form-text text-muted">Escribe el nombre de la categoria</small>
                    </form>


                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>

    </div>





@stop

@section('css')

@stop

@section('js')


@stop

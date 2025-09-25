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

                        <div class="row">
                            <div class="cold-md-12">
                                <div class="form-group">
                                    <label for="nombre">Nombre</label>
                                    <input type="text" class="form-control" name="nombre" id="nombre"
                                        placeholder="Ingrese nombre">
                                </div>
                            </div>


                              <div class="cold-md-12">
                                <div class="form-group">
                                    <label for="nombre">Descripcion</label>
                                 <textarea class="form-control" name="descripcion" id="descripcion" rows="3"></textarea>
                                </div>
                            </div>

                        </div>

                        <hr>
                        <div class="row">
                            <div class="col-md-12">
                               <div class="form-group">
                                
                               </div>

                            </div>
                        </div>

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

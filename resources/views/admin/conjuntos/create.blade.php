@extends('adminlte::page')

@section('content_header')
    <nav aria-label="breadcrumb" style="font-size: 15pt">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/admin') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ url('/admin/conjuntos') }}">Conjuntos</a></li>
            <li class="breadcrumb-item active" aria-current="page">Creación de Conjunto</li>
        </ol>
    </nav>
@stop

@section('content')

<div class="row">
    <div class="col-md-4">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title"><b>Ingrese datos del Conjunto</b></h3>
            </div>

            <div class="card-body">
                <form action="{{ url('/admin/conjuntos/create') }}" method="post">
                    @csrf

                    <div class="row">
                        <div class="col-md-12">
                            <!-- NOMBRE DEL CONJUNTO -->
                            <div class="form-group">
                                <label for="nombre_conjunto">Nombre del Conjunto</label>
                                <input type="text" class="form-control" name="nombre_conjunto" id="nombre_conjunto"
                                    placeholder="Ingrese nombre del conjunto" value="{{ old('nombre_conjunto') }}">
                            </div>

                            @error('nombre_conjunto')
                                <small style="color: red">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="col-md-12">
                            <!-- DESCRIPCIÓN -->
                            <div class="form-group">
                                <label for="descripcion">Descripción</label>
                                <textarea class="form-control" name="descripcion" id="descripcion" rows="3"
                                    placeholder="Ingrese descripción">{{ old('descripcion') }}</textarea>
                            </div>
                        </div>
                    </div>

                    <hr>

                    <div class="row">
                        <div class="col-md-12 text-right">
                            <a href="{{ url('/admin/conjuntos') }}" class="btn btn-secondary">Cancelar</a>
                            <button type="submit" class="btn btn-primary">Guardar</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

@stop

@section('css')
@stop

@section('js')
<script>
    // Puedes agregar validaciones JS o mensajes aquí si lo deseas
</script>
@stop

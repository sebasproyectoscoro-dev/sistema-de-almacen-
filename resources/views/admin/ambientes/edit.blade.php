@extends('adminlte::page')

@section('content_header')
    <nav aria-label="breadcrumb" style="font-size: 15pt">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/admin') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ url('/admin/ambientes') }}">Ambientes</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edición de ambientes</li>
        </ol>
    </nav>
@stop

@section('content')

    <div class="row">
        <div class="col-md-4">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title"><b>Ingrese datos</b></h3>
                </div>

                <div class="card-body" style="display: block;">

                    <form action="{{ url('/admin/ambientes/'.$ambiente->id) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="row">

                            <!-- Nombre -->
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="nombre">Nombre del ambiente</label>
                                    <input type="text" value="{{ $ambiente->nombre }}" class="form-control" name="nombre" id="nombre"
                                           placeholder="Ingrese nombre del ambiente">
                                </div>

                                @error('nombre')
                                    <small style="color: red">
                                        {{ $message }}
                                    </small>
                                @enderror
                            </div>

                            <!-- Tipo de ambiente -->
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="tipo_ambiente">Tipo de ambiente</label>
                                    <select class="form-control" name="tipo_ambiente" id="tipo_ambiente">
                                        <option value="">Seleccione tipo</option>
                                        <option value="Laboratorio" {{ $ambiente->tipo_ambiente == 'Laboratorio' ? 'selected' : '' }}>Laboratorio</option>
                                        <option value="Oficina" {{ $ambiente->tipo_ambiente == 'Oficina' ? 'selected' : '' }}>Oficina</option>
                                        <option value="Aula" {{ $ambiente->tipo_ambiente == 'Aula' ? 'selected' : '' }}>Aula</option>
                                        <option value="Otro" {{ $ambiente->tipo_ambiente == 'Otro' ? 'selected' : '' }}>Otro</option>
                                    </select>
                                </div>

                                @error('tipo_ambiente')
                                    <small style="color: red">
                                        {{ $message }}
                                    </small>
                                @enderror
                            </div>

                            <!-- Descripción -->
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="descripcion">Descripción</label>
                                    <textarea class="form-control" name="descripcion" id="descripcion" rows="3" placeholder="Ingrese descripción">{{ $ambiente->descripcion }}</textarea>
                                </div>
                            </div>

                        </div>

                        <hr>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <a href="{{ url('/admin/ambientes') }}" class="btn btn-secondary">Cancelar</a>
                                    <button type="submit" class="btn btn-primary">Actualizar</button>
                                </div>
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
    // JS opcional
</script>
@stop

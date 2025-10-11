@extends('adminlte::page')

@section('content_header')
    <nav aria-label="breadcrumb" style="font-size: 15pt">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/admin') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ url('/admin/ambientes') }}">Ambientes</a></li>
            <li class="breadcrumb-item active" aria-current="page">Creación de ambientes</li>
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

                    <form action="{{ url('/admin/ambientes/create') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="nombre">Nombre del ambiente</label>
                                    <input type="text" class="form-control" name="nombre" id="nombre"
                                           placeholder="Ingrese nombre del ambiente" value="{{ old('nombre') }}">
                                </div>

                                @error('nombre')
                                    <small style="color: red">
                                        {{ $message }}
                                    </small>
                                @enderror
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="tipo_ambiente">Tipo de ambiente</label>
                                    <select class="form-control" name="tipo_ambiente" id="tipo_ambiente">
                                        <option value="">Seleccione tipo</option>
                                        <option value="Laboratorio" {{ old('tipo_ambiente') == 'Laboratorio' ? 'selected' : '' }}>Laboratorio</option>
                                        <option value="Oficina" {{ old('tipo_ambiente') == 'Oficina' ? 'selected' : '' }}>Oficina</option>
                                        <option value="Aula" {{ old('tipo_ambiente') == 'Aula' ? 'selected' : '' }}>Aula</option>
                                        <option value="Otro" {{ old('tipo_ambiente') == 'Otro' ? 'selected' : '' }}>Otro</option>
                                    </select>
                                </div>

                                @error('tipo_ambiente')
                                    <small style="color: red">
                                        {{ $message }}
                                    </small>
                                @enderror
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="descripcion">Descripción</label>
                                    <textarea class="form-control" name="descripcion" id="descripcion" rows="3"
                                              placeholder="Ingrese descripción">{{ old('descripcion') }}</textarea>
                                </div>
                            </div>
                        </div>

                        <hr>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <a href="{{ url('/admin/ambientes') }}" class="btn btn-secondary">Cancelar</a>
                                    <button type="submit" class="btn btn-primary">Guardar</button>
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
    // Puedes agregar lógica JS aquí si es necesario
</script>
@stop

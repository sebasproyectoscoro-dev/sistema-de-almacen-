@extends('adminlte::page')

@section('content_header')
    <nav aria-label="breadcrumb" style="font-size: 15pt">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/admin') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ url('/admin/ambientes') }}">Ambientes</a></li>
            <li class="breadcrumb-item active" aria-current="page">Detalle del ambiente</li>
        </ol>
    </nav>
@stop

@section('content')

<div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column">
    <div class="card bg-light d-flex flex-fill">
        <div class="card-header text-muted border-bottom-0">
            Ambiente
        </div>
        <div class="card-body pt-0">
            <div class="row">
                <div class="col-7">
                    <h2 class="lead"><b>{{ $ambiente->nombre }}</b></h2>
                    <p class="text-muted text-sm"><b>Tipo de ambiente: </b> {{ $ambiente->tipo_ambiente }}</p>
                    <p class="text-muted text-sm"><b>Descripción: </b> {{ $ambiente->descripcion }}</p>
                </div>
                <div class="col-5 text-center">
                    <!-- Ícono representativo del ambiente -->
                    <i class="fas fa-building fa-4x text-muted"></i>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <div class="text-right">
                <!-- Botón Volver -->
                <a href="{{ url('/admin/ambientes') }}" class="btn btn-sm btn-secondary">
                    <i class="fas fa-arrow-left"></i> Volver
                </a>
                <!-- Botón Editar -->
                <a href="{{ url('/admin/ambientes/'.$ambiente->id.'/edit') }}" class="btn btn-sm btn-warning">
                    <i class="fas fa-edit"></i> Editar
                </a>
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

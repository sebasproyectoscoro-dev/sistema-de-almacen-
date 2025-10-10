@extends('adminlte::page')

@section('title', 'Detalle de Asignación')

@section('content_header')
    <h1 class="text-primary"><i class="fas fa-desktop"></i> Detalle de Asignación</h1>
@stop

@section('content')
<div class="card shadow">
  <div class="card-header bg-primary text-white">
    <h3 class="card-title"><i class="fas fa-clipboard-list"></i> Asignación — Ambiente: <b>Laboratorio Informático</b></h3>
    <div class="card-tools">
      <button type="button" class="btn btn-tool text-white" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
    </div>
  </div>

  <div class="card-body">
    <div class="row">
      <!-- Información general -->
      <div class="col-lg-8 col-md-12 order-2 order-lg-1">
        
        <div class="row">
          <div class="col-sm-4">
            <div class="info-box bg-light">
              <div class="info-box-content">
                <span class="info-box-text text-center text-muted">Ambiente</span>
                <span class="info-box-number text-center text-muted mb-0">Laboratorio Informático</span>
              </div>
            </div>
          </div>
          <div class="col-sm-4">
            <div class="info-box bg-light">
              <div class="info-box-content">
                <span class="info-box-text text-center text-muted">Responsable</span>
                <span class="info-box-number text-center text-muted mb-0">Carlos Rojas</span>
              </div>
            </div>
          </div>
          <div class="col-sm-4">
            <div class="info-box bg-light">
              <div class="info-box-content">
                <span class="info-box-text text-center text-muted">Fecha de Asignación</span>
                <span class="info-box-number text-center text-muted mb-0">10/10/2025</span>
              </div>
            </div>
          </div>
        </div>

        <!-- Lista de PCs (con scroll) -->
        <h4 class="text-primary mt-4"><i class="fas fa-laptop"></i> Equipos Asignados</h4>

        <div class="p-2 border rounded bg-white" style="max-height: 450px; overflow-y: auto;">
          @foreach(range(1, 10) as $i)
          <div class="card mb-3 border border-primary">
            <div class="card-header bg-light">
              <h5 class="mb-0"><i class="fas fa-desktop text-primary"></i> PC #{{ $i }} — Código: <b>PC-00{{ $i }}</b></h5>
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-sm-6 col-md-3">
                  <div class="info-box bg-white shadow-sm">
                    <div class="info-box-content text-center">
                      <span class="info-box-text text-muted">Monitor</span>
                      <span class="info-box-number text-muted">Dell 24"</span>
                    </div>
                  </div>
                </div>
                <div class="col-sm-6 col-md-3">
                  <div class="info-box bg-white shadow-sm">
                    <div class="info-box-content text-center">
                      <span class="info-box-text text-muted">CPU</span>
                      <span class="info-box-number text-muted">Intel Core i5</span>
                    </div>
                  </div>
                </div>
                <div class="col-sm-6 col-md-3">
                  <div class="info-box bg-white shadow-sm">
                    <div class="info-box-content text-center">
                      <span class="info-box-text text-muted">Teclado</span>
                      <span class="info-box-number text-muted">Logitech K120</span>
                    </div>
                  </div>
                </div>
                <div class="col-sm-6 col-md-3">
                  <div class="info-box bg-white shadow-sm">
                    <div class="info-box-content text-center">
                      <span class="info-box-text text-muted">Encargado</span>
                      <span class="info-box-number text-muted">Encargado {{ $i }}</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          @endforeach
        </div>
      </div>

      <!-- Columna lateral derecha -->
      <div class="col-lg-4 col-md-12 order-1 order-lg-2">
        <h4 class="text-primary"><i class="fas fa-info-circle"></i> Información adicional</h4>
        <p class="text-muted">
          En este ambiente se realizó la asignación de equipos el <b>10/10/2025</b>.
          Se encuentran <b>10 PCs operativas</b> con un total de <b>40 componentes</b>.
        </p>

        <div class="text-muted">
          <p class="text-sm">Encargado General
            <b class="d-block">Sebastián Coronado</b>
          </p>
          <p class="text-sm">Área
            <b class="d-block">Soporte Técnico</b>
          </p>
        </div>

        <h5 class="mt-4 text-muted"><i class="fas fa-file-alt"></i> Archivos relacionados</h5>
        <ul class="list-unstyled">
          <li><a href="#" class="btn-link text-secondary"><i class="far fa-fw fa-file-pdf"></i> Informe_asignacion.pdf</a></li>
          <li><a href="#" class="btn-link text-secondary"><i class="far fa-fw fa-file-excel"></i> Inventario_Ambiente_Lab1.xlsx</a></li>
        </ul>

        <div class="text-center mt-4">
          <a href="#" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i> Editar Asignación</a>
          <a href="#" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i> Eliminar</a>
        </div>
      </div>
    </div>
  </div>
</div>
@stop

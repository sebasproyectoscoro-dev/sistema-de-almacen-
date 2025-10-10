@extends('adminlte::page')

@section('title', 'Nueva Asignación')

@section('content_header')
    <h1 class="text-primary"><i class="fas fa-tasks"></i> Nueva Asignación de Equipos</h1>
@stop

@section('content')
<div class="container mt-3">
  <div class="card card-navy shadow">
    <div class="card-header">
      <h3 class="card-title"><i class="fas fa-clipboard-list"></i> Detalle de Asignación</h3>
    </div>

    <div class="card-body">
      <form id="formAsignacion">
        <div class="row mb-3">
          <div class="col-md-4">
            <label class="fw-bold">Conjunto</label>
            <div class="input-group">
              <span class="input-group-text bg-primary text-white"><i class="fas fa-cubes"></i></span>
              <input type="text" id="conjunto" class="form-control" placeholder="Buscar conjunto...">
            </div>
          </div>

          <div class="col-md-4">
            <label class="fw-bold">Ambiente</label>
            <div class="input-group">
              <span class="input-group-text bg-success text-white"><i class="fas fa-building"></i></span>
              <input type="text" id="ambiente" class="form-control" placeholder="Buscar ambiente...">
            </div>
          </div>

          <div class="col-md-4">
            <label class="fw-bold">Fecha de Asignación</label>
            <div class="input-group">
              <span class="input-group-text bg-info text-white"><i class="fas fa-calendar-alt"></i></span>
              <input type="date" id="fecha_asignacion" class="form-control" value="{{ date('Y-m-d') }}">
            </div>
          </div>
        </div>

        <div class="row mb-3">
          <div class="col-md-6">
            <label class="fw-bold">Responsable</label>
            <div class="input-group">
              <span class="input-group-text bg-warning text-white"><i class="fas fa-user"></i></span>
              <input type="text" id="responsable" class="form-control" placeholder="Buscar persona...">
            </div>
          </div>

          <div class="col-md-6">
            <label class="fw-bold">Encargado</label>
            <div class="input-group">
              <span class="input-group-text bg-secondary text-white"><i class="fas fa-user-tie"></i></span>
              <input type="text" id="encargado" class="form-control" placeholder="Buscar persona...">
            </div>
          </div>
        </div>

        <hr>

        {{-- Tabla dinámica de productos --}}
        <div class="d-flex justify-content-between align-items-center mb-2">
          <h5 class="text-primary mb-0"><i class="fas fa-box"></i> Equipos Asignados</h5>
          <button type="button" id="btnAddProducto" class="btn btn-sm btn-success">
            <i class="fas fa-plus"></i> Agregar Producto
          </button>
        </div>

        <div class="table-responsive">
          <table class="table table-bordered table-striped" id="tablaProductos">
            <thead class="table-dark text-center">
              <tr>
                <th style="width: 15%">Código</th>
                <th style="width: 25%">Nombre</th>
                <th style="width: 15%">Marca</th>
                <th style="width: 15%">Serie</th>
                <th style="width: 20%">Observaciones</th>
                <th style="width: 10%">Acción</th>
              </tr>
            </thead>
            <tbody id="tbodyProductos">
              {{-- Filas dinámicas aquí --}}
            </tbody>
          </table>
        </div>

        <div class="text-end mt-3">
          <button type="submit" class="btn btn-primary">
            <i class="fas fa-save"></i> Guardar Asignación
          </button>
        </div>
      </form>
    </div>
  </div>
</div>
@stop

@section('js')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.min.js"></script>
<link rel="stylesheet" href="https://code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">

<script>
$(function(){

  const personas = ["María Fernández", "Carlos Rojas", "Sebastián Torres", "Lucía Díaz"];
  const ambientes = ["Oficina", "Laboratorio", "Depósito", "Sala de Reuniones"];
  const conjuntos = ["Conjunto Principal", "Conjunto Secundario", "Conjunto A", "Conjunto B"];

  // Autocompletar texto simple
  $("#responsable, #encargado").autocomplete({ source: personas });
  $("#ambiente").autocomplete({ source: ambientes });
  $("#conjunto").autocomplete({ source: conjuntos });

  // Agregar fila de producto
  $("#btnAddProducto").on("click", function(){
    const fila = `
      <tr>
        <td><input type="text" class="form-control input-codigo" placeholder="Buscar por código..."></td>
        <td><input type="text" class="form-control input-nombre" placeholder="Nombre" readonly></td>
        <td><input type="text" class="form-control input-marca" placeholder="Marca" readonly></td>
        <td><input type="text" class="form-control input-serie" placeholder="Serie" readonly></td>
        <td><input type="text" class="form-control input-observaciones" placeholder="Observaciones"></td>
        <td class="text-center">
          <button type="button" class="btn btn-sm btn-danger btnRemove"><i class="fas fa-trash"></i></button>
        </td>
      </tr>`;
    $("#tbodyProductos").append(fila);

    activarAutocomplete();
  });

  // Activar autocompletar dinámico (consulta a Laravel)
  function activarAutocomplete() {
    $(".input-codigo").autocomplete({
      source: function(request, response) {
        $.ajax({
          url: "{{ route('productos.buscar') }}",
          dataType: "json",
          data: { term: request.term },
          success: function(data) {
            response(data);
            
          }
        });
      },
      select: function(event, ui) {
        const producto = ui.item.data;
        const fila = $(this).closest("tr");
        fila.find(".input-nombre").val(producto.nombre);
        fila.find(".input-marca").val(producto.marca);
        fila.find(".input-serie").val(producto.serie);
        fila.find(".input-observaciones").val(producto.observaciones);
      }
    });
  }

  // Eliminar fila
  $(document).on("click", ".btnRemove", function(){
    $(this).closest("tr").remove();
  });

  // Envío simulado (ver consola)
  $("#formAsignacion").on("submit", function(e){
    e.preventDefault();

    const productosAsignados = [];
    $("#tbodyProductos tr").each(function(){
      productosAsignados.push({
        codigo: $(this).find(".input-codigo").val(),
        nombre: $(this).find(".input-nombre").val(),
        marca: $(this).find(".input-marca").val(),
        serie: $(this).find(".input-serie").val(),
        observaciones: $(this).find(".input-observaciones").val(),
      });
    });

    const data = {
      conjunto: $("#conjunto").val(),
      ambiente: $("#ambiente").val(),
      responsable: $("#responsable").val(),
      encargado: $("#encargado").val(),
      fecha: $("#fecha_asignacion").val(),
      productos: productosAsignados
    };

    console.log("Datos de asignación:", data);
    alert("Asignación enviada (ver consola).");
  });

});
</script>
@stop


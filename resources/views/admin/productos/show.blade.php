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

<div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column">
    <div class="card bg-light d-flex flex-fill shadow-sm">
        <div class="card-header text-muted border-bottom-0">
            Producto
        </div>

        <div class="card-body pt-0">
            <div class="row">
                <div class="col-7">
                    <h2 class="lead"><b>{{ $producto->nombre }}</b></h2>
                    <p class="text-muted text-sm">
                        <b>Categoría: </b> {{ $producto->categoria->nombre ?? 'Sin categoría' }} <br>
                        <b>Marca: </b> {{ $producto->marca ?? 'Sin marca' }} <br>
                        <b>Código: </b> {{ $producto->codigo }} <br>
                        <b>Serial: </b> {{ $producto->serial }}
                    </p>
                </div>
                <div class="col-5 text-center">
                    <img src="{{ asset('storage') . '/' . $producto->imagen }}"
                        alt="Imagen del producto"
                        class="img-circle img-fluid border border-2"
                        style="width: 120px; height: 120px; object-fit: cover;">
                </div>
            </div>
        </div>

        <div class="card-footer bg-white">
            <div class="row">
                <div class="col-md-12">
                    <p class="text-muted text-sm">
                        <b>Descripción:</b><br>
                        {!! $producto->descripcion !!}
                    </p>
                </div>

                <div class="col-md-12 mt-2">
                    <ul class="list-group list-group-unbordered mb-3">
                        <li class="list-group-item">
                            <b>Precio Compra:</b> <span class="float-right text-success">S/ {{ number_format($producto->precio_compra, 2) }}</span>
                        </li>
                        <li class="list-group-item">
                            <b>Precio Venta:</b> <span class="float-right text-primary">S/ {{ number_format($producto->precio_venta, 2) }}</span>
                        </li>
                        <li class="list-group-item">
                            <b>Stock Mínimo:</b> <span class="float-right">{{ $producto->stock_minimo }}</span>
                        </li>
                        <li class="list-group-item">
                            <b>Stock Máximo:</b> <span class="float-right">{{ $producto->stock_maximo }}</span>
                        </li>
                        <li class="list-group-item">
                            <b>Unidad de medida:</b> <span class="float-right">{{ ucfirst($producto->unidad_medida) }}</span>
                        </li>
                        <li class="list-group-item">
                            <b>Estado:</b>
                            <span class="float-right">
                                @if ($producto->estado == 1)
                                    <span class="badge badge-success">Activo</span>
                                @else
                                    <span class="badge badge-danger">Inactivo</span>
                                @endif
                            </span>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="text-right mt-3">
                <a href="{{ url('/admin/productos') }}" class="btn btn-sm btn-secondary">
                    <i class="fas fa-arrow-left"></i> Volver
                </a>
                <a href="{{ url('/admin/productos/'.$producto->id.'/edit') }}" class="btn btn-sm btn-warning">
                    <i class="fas fa-edit"></i> Editar
                </a>
            </div>
        </div>
    </div>
</div>
```



@stop



@section('css')

@stop

@section('js')
<script>

    
</script>

@stop

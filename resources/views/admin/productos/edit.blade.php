@extends('adminlte::page')


@section('content_header')
    <nav aria-label="breadcrumb" style="font-size: 15pt">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/admin') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ url('/admin/productos') }}">Productos</a></li>
            <li class="breadcrumb-item active" aria-current="page">Creado de productos</li>
        </ol>
    </nav>
@stop


@section('content')


<div class="row">
    <div class="col-md-12">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title"><b>Editar Producto</b></h3>
            </div>

            <div class="card-body" style="display: block;">

                <form action="{{ url('/admin/productos/' . $producto->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="row">
                        <div class="col-md-9">
                            <div class="row">

                                <!-- Categoria -->
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="idcategoria">Seleccione categoría</label>
                                        <div class="input-group mb-3">
                                            <select name="idcategoria" id="idcategoria" class="form-control">
                                                <option value="">Seleccione una categoría</option>
                                                @foreach ($categorias as $categoria)
                                                    <option value="{{ $categoria->id }}"
                                                        {{ old('idcategoria', $producto->idcategoria) == $categoria->id ? 'selected' : '' }}>
                                                        {{ $categoria->nombre }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        @error('idcategoria')
                                            <small style="color: red">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Marca -->
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="marca">Seleccione marca de producto</label>
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control" name="marca" id="marca"
                                                value="{{ old('marca', $producto->marca) }}" placeholder="Ingrese marca">
                                        </div>
                                        @error('marca')
                                            <small style="color: red">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Código -->
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="codigo">Código</label>
                                        <div class="input-group mb-3">
                                            <input type="text" value="{{ old('codigo', $producto->codigo) }}"
                                                class="form-control" name="codigo" id="codigo"
                                                placeholder="Ingrese código" required>
                                        </div>
                                        @error('codigo')
                                            <small style="color: red">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Serial -->
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="serial">Serial</label>
                                        <div class="input-group mb-3">
                                            <input type="text" value="{{ old('serial', $producto->serial) }}"
                                                class="form-control" name="serial" id="serial"
                                                placeholder="Ingrese serial" required>
                                        </div>
                                        @error('serial')
                                            <small style="color: red">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Nombre -->
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="nombre">Nombre de producto</label>
                                        <div class="input-group mb-3">
                                            <input type="text" value="{{ old('nombre', $producto->nombre) }}"
                                                class="form-control" name="nombre" id="nombre"
                                                placeholder="Ingrese nombre" required>
                                        </div>
                                        @error('nombre')
                                            <small style="color: red">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>

                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="descripcion">Descripción</label>
                                        <textarea name="descripcion" id="descripcion" cols="30" rows="5" class="form-control"
                                            placeholder="Ingrese descripción">{{ old('descripcion', $producto->descripcion) }}</textarea>
                                        @error('descripcion')
                                            <small style="color: red">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">

                                <!-- Precio compra -->
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="precio_compra">Precio Compra</label>
                                        <input type="number" style="text-align:center"
                                            value="{{ old('precio_compra', $producto->precio_compra) }}"
                                            class="form-control" name="precio_compra" id="precio_compra" required>
                                        @error('precio_compra')
                                            <small style="color: red">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Precio venta -->
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="precio_venta">Precio Venta</label>
                                        <input type="number" style="text-align:center"
                                            value="{{ old('precio_venta', $producto->precio_venta) }}"
                                            class="form-control" name="precio_venta" id="precio_venta" required>
                                        @error('precio_venta')
                                            <small style="color: red">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Stock mínimo -->
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="stock_minimo">Stock Mínimo</label>
                                        <input type="number" style="text-align:center"
                                            value="{{ old('stock_minimo', $producto->stock_minimo) }}"
                                            class="form-control" name="stock_minimo" id="stock_minimo" required>
                                        @error('stock_minimo')
                                            <small style="color: red">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Stock máximo -->
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="stock_maximo">Stock Máximo</label>
                                        <input type="number" style="text-align:center"
                                            value="{{ old('stock_maximo', $producto->stock_maximo) }}"
                                            class="form-control" name="stock_maximo" id="stock_maximo" required>
                                        @error('stock_maximo')
                                            <small style="color: red">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Unidad de medida -->
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="unidad_medida">Unidad de medida</label>
                                        <select class="form-control" name="unidad_medida" id="unidad_medida">
                                            <option value="">Seleccione medidas</option>
                                            @foreach (['unidad', 'litro', 'kilogramo', 'metro', 'paquete', 'caja', 'otro'] as $unidad)
                                                <option value="{{ $unidad }}"
                                                    {{ old('unidad_medida', $producto->unidad_medida) == $unidad ? 'selected' : '' }}>
                                                    {{ ucfirst($unidad) }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('unidad_medida')
                                            <small style="color: red">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Estado -->
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="estado">Estado</label>
                                        <select class="form-control" name="estado" id="estado" required>
                                            <option value="">Seleccione estado</option>
                                            <option value="1" {{ old('estado', $producto->estado) == '1' ? 'selected' : '' }}>Activo</option>
                                            <option value="0" {{ old('estado', $producto->estado) == '0' ? 'selected' : '' }}>Inactivo</option>
                                        </select>
                                        @error('estado')
                                            <small style="color: red">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>

                            </div>
                        </div>

                        <!-- Imagen -->
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="imagen">Imagen del producto</label>
                                <div class="input-group mb-3">
                                    <img style="width:100%; border:1px solid #ccc; border-radius:8px"
                                        src="{{ asset('storage') . '/' . $producto->imagen }}"
                                        alt="Imagen del producto" id="previewImage">
                                </div>
                                <div class="input-group mb-3">
                                    <input type="file" class="form-control" name="imagen" id="imagen" accept="image/*"
                                        onchange="previewSelectedImage(event)">
                                </div>
                                <script>
                                    function previewSelectedImage(event) {
                                        const input = event.target;
                                        const previewImage = document.getElementById('previewImage');
                                        if (input.files && input.files[0]) {
                                            const reader = new FileReader();
                                            reader.onload = function(e) {
                                                previewImage.src = e.target.result;
                                            }
                                            reader.readAsDataURL(input.files[0]);
                                        }
                                    }
                                </script>
                                @error('imagen')
                                    <small style="color: red">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <hr>
                    <div class="row">
                        <div class="col-md-12">
                            <a href="{{ url('/admin/productos') }}" class="btn btn-secondary">Cancelar</a>
                            <button type="submit" class="btn btn-primary">Actualizar</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
```



@stop

@section('css')

    <style>
        .ck.ck-editor {
            width: 100% !important;
        }

        .ck-editor__editable {
            width: 100% !important;
            min-height: 300px;
            box-sizing: border-box;
        }

        .ck.ck-toolbar {
            flex-wrap: wrap;
        }

        @media (max-width: 768px) {
            .ck-editor__editable {
                min-height: 250px;
                padding: 10px;
            }
        }
    </style>


@stop

@section('js')

    <!-- /.check editor   https://ckeditor.com/ -->



    <script src="https://cdn.ckeditor.com/ckeditor5/41.4.2/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create(document.querySelector('#descripcion'), {
                toolbar: {
                    items: [
                        'heading', '|',
                        'bold', 'italic', 'underline', 'strikethrough', 'subscript', 'superscript', '|',
                        'link', 'bulletedList', 'numberedList', '|',
                        'outdent', 'indent', '|',
                        'alignment', '|',
                        'blockQuote', 'insertTable', 'mediaEmbed', '|',
                        'undo', 'redo', '|',
                        'fontBackgroundColor', 'fontColor', 'fontSize', 'fontFamily', '|',
                        'code', 'codeBlock', 'htmlEmbed', '|',
                        'sourceEditing'
                    ],
                    shouldNotGroupWhenFull: true
                },
                language: 'es'
            })
            .then(editor => {
                // Forzar responsive después de crear el editor
                const editorEl = editor.ui.view.element;
                editorEl.style.width = '100%';
                editorEl.querySelector('.ck-editor__editable').style.width = '100%';
            })
            .catch(error => {
                console.error(error);
            });
    </script>



@stop




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
                    <h3 class="card-title"><b>Ingrese datos</b></h3>
                    <!-- /.card-tools -->
                </div>
                <!-- /.card-header -->
                <div class="card-body" style="display: block;">

                    <form action="{{ url('/admin/productos/create') }}" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="row">
                            <div class="col-md-9">

                                <div class="row">

                                    <!--  Categoria   -->
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="nombre">Seleccione categoria</label>
                                            <div class="input-group  mb-3">
                                                <select name="idcategoria" id="idcategoria" class="form-control">
                                                    <option value="">Seleccione una categoria</option>
                                                    @foreach ($categorias as $categoria)
                                                        <option value="{{ $categoria->id }}"
                                                            {{ old('idcategoria') == $categoria->id ? 'selected' : '' }}>
                                                            {{ $categoria->nombre }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            @error('idcategoria')
                                                <small style="color: red">
                                                    {{ $message }}
                                                </small>
                                            @enderror
                                        </div>
                                    </div>

                                    <!--  Marca   -->
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="nombre">Seleccione marca de producto</label>
                                            <div class="input-group  mb-3">
                                                <select name="marca" id="marca" class="form-control">
                                                    <option value="">Seleccione una marca</option>
                                                    @foreach ($categorias as $categoria)
                                                        <option value="{{ $categoria->id }}"
                                                            {{ old('marca') == $categoria->id ? 'selected' : '' }}>
                                                            {{ $categoria->nombre }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            @error('marca')
                                                <small style="color: red">
                                                    {{ $message }}
                                                </small>
                                            @enderror
                                        </div>
                                    </div>

                                    <!--  Codigo   -->
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="codigo">Codigo</label>
                                            <div class="input-group mb-3">
                                                <input type="text" value="{{ old('codigo') }}" class="form-control"
                                                    name="codigo" id="codigo" placeholder="Ingrese codigo" required>
                                            </div>
                                            @error('codigo')
                                                <small style="color: red">
                                                    {{ $message }}
                                                </small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="codigo">Serial</label>
                                            <div class="input-group mb-3">
                                                <input type="text" value="{{ old('serial') }}" class="form-control"
                                                    name="serial" id="serial" placeholder="Ingrese serial" required>
                                            </div>
                                            @error('serial')
                                                <small style="color: red">
                                                    {{ $message }}
                                                </small>
                                            @enderror
                                        </div>
                                    </div>

                                    <!--  Nombre   -->
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="nombre">Nombre de producto</label>
                                            <div class="input-group mb-3">
                                                <input type="text" value="{{ old('nombre') }}" class="form-control"
                                                    name="nombre" id="nombre" placeholder="Ingrese nombre" required>
                                            </div>
                                            @error('nombre')
                                                <small style="color: red">
                                                    {{ $message }}
                                                </small>
                                            @enderror
                                        </div>
                                    </div>

                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="descripcion">Descripcion</label>
                                            <div class="editor-wrapper">

                                                <textarea name="descripcion" id="descripcion" cols="30" rows="10" class="form-control"></textarea>

                                            </div>
                                            @error('descripcion')
                                                <small style="color: red">
                                                    {{ $message }}
                                                </small>
                                            @enderror

                                        </div>
                                    </div>

                                </div>

                                <div class="row">
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="precio_compra"> Precio Compra </label>
                                            <div class="input-group- mb-3">
                                                <input style="text-align: center" type="number"
                                                    value="{{ old('precio_compra') }}" class="form-control"
                                                    name="precio_compra" id="precio_compra"
                                                    placeholder="Ingrese precio de compra" required>
                                            </div>
                                            @error('precio_compra')
                                                <small style="color: red">
                                                    {{ $message }}
                                                </small>
                                            @enderror
                                        </div>
                                    </div>


                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="precio_venta"> Precio venta </label>
                                            <div class="input-group- mb-3">
                                                <input style="text-align: center" type="number"
                                                    value="{{ old('precio_venta') }}" class="form-control"
                                                    name="precio_venta" id="precio_venta"
                                                    placeholder="Ingrese precio de venta" required>
                                            </div>
                                            @error('precio_venta')
                                                <small style="color: red">
                                                    {{ $message }}
                                                </small>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="stock_minimo"> Stock Minimo </label>
                                            <div class="input-group- mb-3">
                                                <input style="text-align: center" type="number"
                                                    value="{{ old('stock_minimo') }}" class="form-control"
                                                    name="stock_minimo" id="stock_minimo"
                                                    placeholder="Ingrese stock minimo" required>
                                            </div>
                                            @error('stock_minimo')
                                                <small style="color: red">
                                                    {{ $message }}
                                                </small>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="stock_maximo"> Stock Maximo </label>
                                            <div class="input-group- mb-3">
                                                <input style="text-align: center" type="number"
                                                    value="{{ old('stock_maximo') }}" class="form-control"
                                                    name="stock_maximo" id="stock_maximo"
                                                    placeholder="Ingrese stock maximo" required>
                                            </div>
                                            @error('stock_maximo')
                                                <small style="color: red">
                                                    {{ $message }}
                                                </small>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="unidad_medida"> Unidad medida </label>
                                            <div class="input-group- mb-3">
                                                <select class="form-control" name="unidad_medida" id="unidad_medida">
                                                    <option value="">Seleccione medidas</option>
                                                    <option value="unidad"  {{ old('unidad_medida') == 'unidad' ? 'selected' : '' }}>Unidad</option>
                                                    <option value="litro"  {{ old('unidad_medida') == 'litro' ? 'selected' : '' }}>Litro</option>
                                                    <option value="kilogramo"  {{ old('unidad_medida') == 'kilogramo' ? 'selected' : '' }}>Kilogramo</option>
                                                    <option value="metro"  {{ old('unidad_medida') == 'metro' ? 'selected' : '' }}>Metro</option>
                                                    <option value="paquete"  {{ old('unidad_medida') == 'paquete' ? 'selected' : '' }}>Paquete</option>
                                                    <option value="caja"  {{ old('unidad_medida') == 'caja' ? 'selected' : '' }}>Caja</option>
                                                    <option value="otro"  {{ old('unidad_medida') == 'otro' ? 'selected' : '' }}>Otro</option>
                                                </select>
                                            </div>
                                            @error('unidad_medida')
                                                <small style="color: red">
                                                    {{ $message }}
                                                </small>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="estado"> Estado </label>
                                            <div class="input-group- mb-3">
                                                <select class="form-control" name="estado" id="estado" required>
                                                    <option value="">Seleccione medidas</option>
                                                    <option value="1"  {{ old('estado') == '1' ? 'selected' : '' }}>Activo</option>
                                                    <option value="0" {{ old('estado') == '0' ? 'selected' : '' }}>Inactivo</option>
                                                </select>
                                            </div>
                                            @error('estado')
                                                <small style="color: red">
                                                    {{ $message }}
                                                </small>
                                            @enderror
                                        </div>
                                    </div>





                                </div>

                            </div>
                            <div class="col-md-3">
                               <div class="row">
                                     <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="imagen">Imagen de producto</label>
                                            <div class="input-group mb-3">
                                                <img style="width: 100%" src="{{ asset('images/productos/default.png') }}"
                                                    alt="Imagen de producto" id="previewImage">
                                            </div>
                                            <div class="input-group mb-3">
                                                <input type="file" class="form-control" name="imagen" id="imagen"
                                                    accept="image/*" onchange="previewSelectedImage(event)" >
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
                                                            } else {
                                                                // Si no hay archivo seleccionado, restablecer la imagen predeterminada
                                                                previewImage.src = "{{ asset('images/productos/default.png') }}";
                                                            }
                                                        }
                                                    </script>
                                            </div>
                                            @error('imagen')
                                                <small style="color: red">
                                                    {{ $message }}
                                                </small>
                                            @enderror
                                        </div>
                                     </div>
                               </div>
                            </div>
                        </div>



                        <hr>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <a href="{{ url('/admin/productos') }}" class="btn btn-secondary">Cancelar</a>
                                    <button type="submit" class="btn btn-primary">Guardar</button>

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

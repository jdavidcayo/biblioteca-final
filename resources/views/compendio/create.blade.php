@extends('adminlte::page')

@section('title', 'Compendio')

@section('content_header')
    
@stop

@section('content')
<section class="content container-fluid">
    <div class="row flex justify-content-center">
        <div class="col-md-10">
            <h2 class="text-secondary my-2 px-2" style="background-color: #fcd5c9">Compendios</h2>

            <div class="card card-default">
                <div class="card-header bg-admin-card-title ">
                    <span class="card-title font-gothamBold">NUEVO ELEMENTO</span>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('compendio.store') }}"  role="form" enctype="multipart/form-data">
                        @csrf

                        <div class="box box-info padding-1">
                            <div class="box-body">
                                
                                <div class="form-group">
                                    <label class="text-secondary">Titulo</label>
                                    <input type="text" name='titulo' class="form-control" placeholder="Titulo" required>
                                </div>
                                
                                <div class="form-group">
                                    <label class="text-secondary">Síntesis</label>
                                    <input type="text" name="descripcion" id="descripcion" hidden>
                                    <trix-editor input="descripcion"></trix-editor>
                                </div>
                                
                                <div class="form-group d-flex flex-col justify-content-between mt-4 flex-wrap">
                                    <div class="item-fecha">
                                        <label class="text-secondary">Fecha</label>
                                        <input type="date" name='fecha' class="form-control" placeholder="Fecha">
                                    </div>
                                    <div class="item-estado">
                                        <label class="text-secondary">Estado</label>
                                        <select name="estado" id="idSelect" class="form-control">
                                            <option value="1">Activo</option>
                                            <option value="0">Borrador</option>
                                        </select>
                                    </div>
                                    <div class="item-identificacion">
                                        <label class="text-secondary">Identificación</label>
                                        <input type="text" name='titulo' class="form-control" placeholder="Identificación" required>
                                    </div>
                                    <div class="item-area">
                                        <label class="text-secondary">Area</label>
                                        <select name="area" id="idSelect" class="form-control">
                                            <option value="1">Tribunal Electoral del Poder
                                                Judicial de la Federación</option>
                                            <option value="0">Tribunal Electoral del Poder
                                                Judicial de la Federación</option>
                                        </select>
                                    </div>
                                    <div class="">
                                        <label class="text-secondary">Archivo</label>
                                        <input type="file" name="urlArchivo" id="urlArchivo" class="form-control">
                                    </div>
                            </div>
                            <div class="box-footer mt20">
                                <button type="submit" class="btn btn-primary">CREAR</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

@stop

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
    <link rel="stylesheet" href=" {{ asset('assets/css/trix.css') }}">
    <link rel="stylesheet" href=" {{ asset('assets/css/styles.css') }}">
@stop

@section('js')
    <script src="{{ asset('assets/js/trix.umd.min.js') }}"></script>

<script>

    document.addEventListener("trix-initialize", function(event) {
        var trix = event.target;
        trix.toolbarElement.querySelector(".trix-button-group--file-tools").style.display = "none";
    });

</script>
@stop


@extends('adminlte::page')

@section('title', 'Formatos')

@section('content_header')
    <h2 class="text-secondary my-2 px-2" style="background-color: #fcd5c9">Formato</h2>

@stop

@section('content')
    <section class="content container-fluid">
        <div class="row flex justify-content-center">
            <div class="col-md-10">

                <div class="card card-default">

                    <div class="card-body">
                        <form method="POST" action="{{ route('formatos.update', $formato->id) }}" role="form"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="box box-info padding-1">
                                <div class="box-body">

                                    <div class="form-group">
                                        <label class="text-secondary">Titulo</label>
                                        <input type="text" name='titulo' class="form-control" placeholder="Titulo"
                                            value="{{ $formato->titulo }}" required>
                                    </div>

                                    <div class="form-group d-flex flex-col justify-content-between mt-4">
                                        <div class="item-fecha">
                                            <label class="text-secondary">Fecha</label>
                                            <input type="date" name='fecha' class="form-control" placeholder="Fecha"
                                                value="{{ $formato->fecha }}">
                                        </div>

                                        <div class="item-estado">
                                            <label class="text-secondary">Estado</label>
                                            <select name="estado" id="idSelect" class="form-control">
                                                <option value="1" @if ($formato->estado == 1) selected @endif>
                                                    Activo</option>
                                                <option value="0"@if ($formato->estado == 0) selected @endif>
                                                    Borrador</option>
                                            </select>
                                        </div>

                                    </div>
                                    <div class="form-group d-flex flex-col justify-content-between mt-4">
                                        <div class="">
                                            <label class="text-secondary">Archivo</label>
                                            <input type="file" name="urlArchivo" id="urlArchivo" class="form-control" value="{{ $formato->urlDocumento }}">
                                        </div>

                                        <div class="item">
                                            <label class="text-secondary">Tema</label>
                                            <select name="tema" id="idTemaSelect" class="form-control">
                                                {{-- consultar --}}
                                            </select>
                                        </div>

                                    </div>

                                    <div class="form-group">
                                        <label class="text-secondary">Organismo</label>
                                        <select name="organizacion" id="idOrganizacionSelect" class="form-control">
                                            {{-- consultar --}}
                                        </select>
                                    </div>

                                </div>
                                <div class="box-footer mt20">
                                    <button type="submit" class="btn btn-primary">ACTUALIZAR</button>
                                    <a href="{{ route('formato.admin') }}" class="btn btn-secondary">CANCELAR</a>
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

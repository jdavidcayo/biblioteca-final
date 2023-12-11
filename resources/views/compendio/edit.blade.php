@extends('adminlte::page')

@section('title', 'Compendios')

@section('content_header')
    <h3 class="text-secondary my-2 px-2" style="background-color: #fcd5c9">Compendio</h3>
@stop

@section('content')
    <section class="content container-fluid">
        <div class="row flex justify-content-center mt-4">
            <div class="col-md-10">
                <div class="card card-default">
                    <div class="card-body">
                        <form method="POST" action="{{ route('compendio.update', $compendio->id) }}" role="form" enctype="multipart/form-data">
                            @method('PUT')
                            @csrf

                            <div class="box box-info padding-1">
                                <div class="box-body">
                                    <div class="form-group">
                                        <label class="text-secondary">Titulo</label>
                                        <input type="text" name='titulo' class="form-control" placeholder="Titulo" required value="{{ $compendio->titulo }}">
                                    </div>

                                    <div class="form-group">
                                        <label class="text-secondary">Síntesis</label>
                                        <input type="text" name="sintesis" id="sintesis" hidden>
                                        <trix-editor input="sintesis">{{ $compendio->sintesis }}</trix-editor>
                                    </div>

                                    <div class="form-group">
                                        <label class="text-secondary">Identificación</label>
                                        <input type="text" name='identificacion' class="form-control" placeholder="Identificación" required value="{{ $compendio->identificacion }}">
                                    </div>

                                    <div class="form-group d-flex flex-col justify-content-between mt-4 flex-wrap">
                                        <div class="item-fecha">
                                            <label class="text-secondary">Fecha</label>
                                            <input type="date" name='fecha' class="form-control" placeholder="Fecha" value="{{ $compendio->fecha }}">
                                        </div>

                                        <div class="item-estado">
                                            <label class="text-secondary">Estado</label>
                                            <select name="estado" id="estado" class="form-control">
                                                <option value="1" {{ $compendio->estado == 1 ? 'selected' : '' }}>Activo</option>
                                                <option value="0" {{ $compendio->estado == 0 ? 'selected' : '' }}>Borrador</option>
                                            </select>
                                        </div>

                                        <div class="item-area">
                                            <label class="text-secondary">Area</label>
                                            <select name="area" id="area" class="form-control">
                                                <option value="1" {{ $compendio->area == 1 ? 'selected' : '' }}>Tribunal Electoral del Poder Judicial de la Federación</option>
                                                <option value="0" {{ $compendio->area == 0 ? 'selected' : '' }}>Otra Área</option>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label class="text-secondary">Archivo</label>
                                            <input type="file" name="urlDocumento" id="urlDocumento" class="form-control" value="{{ $compendio->urlDocumento }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="box-footer mt20">
                                    <button type="submit" class="btn btn-primary">ACTUALIZAR</button>
                                    <a href="{{ route("compendio.admin") }}" class="btn btn-secondary">CANCELAR</a>
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
    <link rel="stylesheet" href="{{ asset('assets/css/trix.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/styles.css') }}">
@stop

@section('js')
    <script src="{{ asset('assets/js/trix.umd.min.js') }}"></script>

    <script>
        document.addEventListener("trix-initialize", function (event) {
            var trix = event.target;
            trix.toolbarElement.querySelector(".trix-button-group--file-tools").style.display = "none";
        });
    </script>
@stop

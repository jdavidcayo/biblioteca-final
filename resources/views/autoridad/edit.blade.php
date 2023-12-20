@extends('adminlte::page')

@section('title', 'Autoridad')

@section('content_header')
    <h3 class="text-secondary my-2 px-2" style="background-color: #fcd5c9">AUTORIDADES</h3>
@stop

@section('content')
    <section class="content container-fluid">

        <div class="row flex justify-content-center mt-4">
            <div class="col-md-10">

                <div class="card card-default">

                    <div class="card-body">
                        <form method="POST" action="{{ route('autoridades.update', $autoridad->id) }}" role="form"
                            enctype="multipart/form-data">
                            @method('PUT')
                            @csrf

                            <div class="box box-info padding-1">
                                <div class="box-body">

                                    <div class="form-group">
                                        <label class="text-secondary">Nombre</label>
                                        <input type="text" name='nombre' class="form-control"
                                            placeholder="Nombre de autoridad" required value="{{ $autoridad->nombre }}">
                                    </div>

                                    <div class="form-group">

                                        <label class="text-secondary">Descripción</label>
                                        <input type="text" name='descripcion' class="form-control"
                                            placeholder="Descripción" value="{{ $autoridad->descripcion }}" require>

                                    </div>


                                </div>
                                <div class="box-footer mt20">
                                    <button type="submit" class="btn btn-primary ">ACTUALIZAR</button>
                                    <a href="{{ route('autoridades.index') }}" class="btn btn-secondary">CANCELAR</a>
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

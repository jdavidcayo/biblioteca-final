@extends('adminlte::page')

@section('title', 'Area')

@section('content_header')
    <h3 class="text-secondary my-2 px-2" style="background-color: #fcd5c9">AREA</h3>
@stop

@section('content')
    <section class="content container-fluid">

        <div class="row flex justify-content-center mt-4">
            <div class="col-md-10">

                <div class="card card-default">

                    <div class="card-body">
                        <form method="POST" action="{{ route('areas.update', $area) }}" role="form"
                            enctype="multipart/form-data">
                            @method('PUT')
                            @csrf

                            <div class="box box-info padding-1">
                                <div class="box-body">

                                    <div class="form-group">
                                        <label class="text-secondary">Nombre</label>
                                        <input type="text" name='nombre' class="form-control"
                                            placeholder="Nombre de tema" maxlength="254" required value="{{ $area->nombre }}">
                                    </div>

                                    <div class="form-group">

                                        <label class="text-secondary">Descripción</label>
                                        <input type="text" name='descripcion' class="form-control"
                                            placeholder="Descripción" maxlength="254" value="{{ $area->descripcion }}">

                                    </div>


                                </div>
                                <div class="box-footer mt20">
                                    <button type="submit" class="btn btn-primary ">ACTUALIZAR</button>
                                    <a href="{{ route('areas.index') }}" class="btn btn-secondary">CANCELAR</a>
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
    <link rel="stylesheet" href=" {{ asset('assets/css/styles.css') }}">
@stop

@section('js')
    
@stop

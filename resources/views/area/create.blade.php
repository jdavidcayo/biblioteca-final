@extends('adminlte::page')

@section('title', 'Areas')

@section('content_header')
<h3 class="text-secondary my-2 px-2" style="background-color: #fcd5c9">Areas</h3>
@stop

@section('content')
<section class="content container-fluid">
    
    <div class="row flex justify-content-center mt-4">
        <div class="col-md-10">

            <div class="card card-default">
                <div class="card-header bg-admin-card-title ">
                    <span class="card-title font-gothamBold">NUEVA AREA</span>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('areas.store') }}"  role="form" enctype="multipart/form-data">
                        @csrf

                        <div class="box box-info padding-1">
                            <div class="box-body">
                                
                                <div class="form-group">
                                    <label class="text-secondary">Nombre</label>
                                    <input type="text" name='nombre' class="form-control" placeholder="Nombre de area" maxlength="254"  required>
                                </div>
                                
                                <div class="form-group">
                                    
                                        <label class="text-secondary">Descripción</label>
                                        <input type="text" name='descripcion' class="form-control" placeholder="Descripción" maxlength="254">
                                </div>
                                

                            </div>
                            <div class="box-footer mt20">
                                <button type="submit" class="btn btn-primary ">CREAR</button>
                                <a href="{{ route( "areas.index" )}}" class="btn btn-secondary">CANCELAR</a>
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


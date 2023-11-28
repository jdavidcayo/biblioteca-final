@extends('adminlte::page')

@section('title', 'Capsulas')

@section('content_header')
    <h1>Capsulas</h1>
@stop

@section('content')
<section class="content container-fluid">
    <div class="row">
        <div class="col-md-6">

            <div class="card card-default">
                <div class="card-header bg-primary text-white ">
                    <span class="card-title">Crear capsula</span>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('capsulas.store') }}"  role="form" enctype="multipart/form-data">
                        @csrf

                        <div class="box box-info padding-1">
                            <div class="box-body">
                                
                                <div class="form-group">
                                    <label for="Titulo"></label>
                                    <input type="text" name='titulo' class="form-control" placeholder="Titulo" required>
                                </div>
                                <div class="form-group">
                                    <label for="Tema"></label>
                                    <input type="text" name='tema' class="form-control" placeholder="Tema">
                                </div>
                                <div class="form-group">
                                    <label for="Descripcion"></label>
                                    <input type="text" name='descripcion' class="form-control" placeholder="Descripción">
                                </div>
                                <div class="form-group">
                                    <label for="Url"></label>
                                    <input type="text" name='url' class="form-control" placeholder="Url">
                                </div>
                                <div class="form-group">
                                    <label for="Estado"></label>
                                    <select name="estado" id="idSelect" class="form-control">
                                        <option value="1">Activo</option>
                                        <option value="0">Borrador</option>
                                    </select>
                                </div>
                                                        
                            </div>
                            <div class="box-footer mt20">
                                <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
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
    
@stop

@section('js')

@stop


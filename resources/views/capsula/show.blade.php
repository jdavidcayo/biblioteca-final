@extends('adminlte::page')

@section('title', 'Capsula informativa')

@section('content_header')

@stop

@section('content')

<a href="{{ route('capsula.admin') }}" class="btn btn-outline-primary">VOLVER</a>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Detalles de capsula</div>

                    <div class="card-body">
                        <div class="form-group">
                            <label for="titulo">{{ __('Titulo') }}</label>
                            <input type="text" name="titulo" class="form-control" value="{{ $capsula->titulo }}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="tema">{{ __('Tema') }}</label>
                            <input type="text" name="tema" class="form-control" value="{{ $capsula->tema }}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="descripcion">{{ __('Descripción') }}</label>
                            <input type="text" name="descripcion" id="descripcion" 
                                value="{{ $capsula->descripcion }}" readonly hidden>
                                <trix-editor input="descripcion" readonly></trix-editor>
                        </div>
                        <div class="form-group">
                            <label for="url">{{ __('Url') }}</label>
                            <input type="text" name="url" class="form-control" value="{{ $capsula->url }}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="estado">{{ __('Estado') }}</label>
                            
                            <input type="text" name="estado" class="form-control" value="@if ($capsula->estado == 1)Activo @elseif ($capsula->estado == 0) Borrador
                            @endif  "
                                readonly>
                        </div>

                        <div class=" flex flex-row">
                            
                                <label for="estado">Fecha de creación</label>
                                <input type="text" name="estado" class="form-control" value="{{ $capsula->estado }}"
                                    readonly>
                            
                            
                                <label for="estado">Ultima actualización</label>
                                <input type="text" name="estado" class="form-control" value="{{ $capsula->estado }}"
                                    readonly>
                            
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

@stop

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
    <link rel="stylesheet" href=" {{ asset('assets/css/trix.css') }}">
@stop

@section('js')
    <script src="{{ asset('assets/js/trix.umd.min.js') }}"></script>
@stop

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
                        <form method="POST" action="{{ route('capsulas.update', $capsula->id ) }}" role="form"
                            enctype="multipart/form-data">
                            @method('PUT')
                            @csrf
                            <div class="form-group">
                                <label for="titulo">{{ __('Titulo') }}</label>
                                <input type="text" name="titulo" class="form-control" value="{{ $capsula->titulo }}">
                            </div>
                            <div class="form-group">
                                <label for="tema">{{ __('Tema') }}</label>
                                <input type="text" name="tema" class="form-control" value="{{ $capsula->tema }}">
                            </div>
                            <div class="form-group">
                                <label for="descripcion">{{ __('Descripción') }}</label>
                                <input type="text" name="descripcion" class="form-control"
                                    value="{{ $capsula->descripcion }}">
                            </div>
                            <div class="form-group">
                                <label for="url">{{ __('Url') }}</label>
                                <input type="text" name="url" class="form-control" value="{{ $capsula->url }}">

                            </div>
                            <div class="form-group">
                                <label for="estado">{{ __('Estado') }}</label>

                                <input type="text" name="estado" class="form-control"
                                    value="@if ($capsula->estado == 1) Activo @elseif ($capsula->estado == 0) Borrador @endif  ">
                            </div>

                            
                            <div>
                                <a href="{{ route('capsula.admin') }}"></a>
                                <div class="box-footer mt20">
                                    <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

@stop

@section('css')


@stop

@section('js')

@stop

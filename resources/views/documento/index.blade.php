@extends('layouts.base')
@section('content')
@section('titulo_seccion', 'DOCUMENTOS')

    <div class="container mt-4">

        <div class="row">
            <div class="d-flex flex-direction-row align-items-center justify-content-center">
                <ul class="list-inline border border-primary mb-4 p-2 rounded-lg">
                    <li class="list-inline-item">
                        <button class="btn btn-warning text-white p-2">TODOS</button>
                    </li>
                    <li class="list-inline-item">
                        <button class="btn btn-light p-2">SCJN</button>
                    </li>
                    <li class="list-inline-item">
                        <button class="btn btn-light p-2">INE</button>
                    </li>
                    <li class="list-inline-item">
                        <button class="btn btn-light p-2">IEEG</button>
                    </li>
                    <li class="list-inline-item">
                        <button class="btn btn-light p-2">TEPJF</button>
                    </li>
                    <li class="list-inline-item">
                        <button class="btn btn-light p-2">TEEG</button>
                    </li>
                    <li class="list-inline-item">
                        <button class="btn btn-light p-2">OTROS</button>
                    </li>
                </ul>
        </div>
            @forelse ($documentos as $documento)
            <div class="cardEffect mb-4">
                <div class="card flex-md-row flex-column align-items-center border-2">
                    <div class="d-flex">
                        <div class="display-block m-4">
                            <img src="{{ $documento->urlimg }}" class="" alt="Manual img" width="200px" height="200px">
                        </div>
                    </div>
                    <div class="d-flex flex-md-column justify-content-center w-100">
                        <h6 class="text-secondary mt-2">{{ $documento->tema }}</h6>
                        <div class="d-md-flex">
                        <h2 class="text-secondary mt-2 text-2xl">
                        {{ $documento->titulo . ' ' . $documento->acuerdo . ' ' . $documento->sentencia }}
                        </h2>
                        </div>
                        <div class="d-flex align-items-center justify-content-between  mr-6 align-items-center">
                        <p class="text-secondary mt-2">{{ $documento->sintesis }}</p>
                            <a href="#" download="{{ $documento->urldoc . ".pdf" }}">
                                <button class="btn btn-sm btn-warning gothamB text-white rounded-pill btn-xxsm btn-block">DESCARGAR</button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            @empty
                <h4>NINGUN documento POR MOSTRAR</h4>
            @endforelse
            @section('pagination')
            {{ $documentos->links('pagination::simple-bootstrap-5') }}
        @endsection
        </div>
    </div>
@endsection
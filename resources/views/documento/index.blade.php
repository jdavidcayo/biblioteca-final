@extends('layouts.base')
@section('content')
@section('titulo_seccion', 'DOCUMENTOS')

    <div class="container mt-4">

        <div class="row">
            <div class="d-flex flex-direction-row align-items-center justify-content-center">
            <ul class="d-flex border mb-4">
                <li class="mr-2">TODOS</li>
                <li class="mr-2">SCJN</li>
                <li class="mr-2">INE</li>
                <li class="mr-2">IEEG</li>
                <li class="mr-2">TEPJF</li>
                <li class="mr-2">TEEG</li>
                <li class="mr-2">OTROS</li>
            </ul>
        </div>
            @forelse ($documentos as $documento)
            <div class="cardEffect mb-4">
                <div class="card flex-row align-items-center border-2">
                    <div class="d-flex">
                        <div class="display-block m-4">
                            <img src="{{ $documento->urlimg }}" class="" alt="Manual img" width="200px" height="200px">
                        </div>
                    </div>
                    <div class="d-flex flex-md-column justify-content-center">
                        <h6 class="limitedText text-secondary mt-2">{{ $documento->tema }}</h6>
                        
                        <div class="d-md-flex justify-content-center">
                            <h2 class="limitedText text-secondary mt-2 text-2xl">{{ $documento->titulo }}</h2>
                            <h6 class="limitedText text-secondary mt-2">{{ $documento->acuerdo }}</h6>
                            <h6 class="limitedText text-secondary mt-2">{{ $documento->sentencia }}</h6>
                        </div>
                        <div class="d-flex align-items-center justify-content-between  mr-6 align-items-center">
                        <h6 class="limitedText text-secondary mt-2">{{ $documento->sintesis }}</h6>
                            <a href="#" download="{{ $documento->urldoc . ".pdf" }}">
                                <button class="btn btn-sm btn-warning gothamB text-white rounded-pill btn-xxsm">DESCARGAR</button>
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
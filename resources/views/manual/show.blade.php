@extends('layouts.base')

@section('content')
    <div class="container">
        <h3 class="text-secondary pt-4">MANUALES</h3>
    </div>
    <div class="container d-flex flex-row justify-content-between ">
        <div class="d-flex flex-row mt-4 ml-4">
            <a href="{{ route('manual.index') }}" class="d-flex flex-row">
                <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="#ce7386" class="bi bi-grid-fill"
                    viewBox="0 0 16 16">
                    <path
                        d="M1 2.5A1.5 1.5 0 0 1 2.5 1h3A1.5 1.5 0 0 1 7 2.5v3A1.5 1.5 0 0 1 5.5 7h-3A1.5 1.5 0 0 1 1 5.5v-3zm8 0A1.5 1.5 0 0 1 10.5 1h3A1.5 1.5 0 0 1 15 2.5v3A1.5 1.5 0 0 1 13.5 7h-3A1.5 1.5 0 0 1 9 5.5v-3zm-8 8A1.5 1.5 0 0 1 2.5 9h3A1.5 1.5 0 0 1 7 10.5v3A1.5 1.5 0 0 1 5.5 15h-3A1.5 1.5 0 0 1 1 13.5v-3zm8 0A1.5 1.5 0 0 1 10.5 9h3a1.5 1.5 0 0 1 1.5 1.5v3a1.5 1.5 0 0 1-1.5 1.5h-3A1.5 1.5 0 0 1 9 13.5v-3z" />
                </svg>
                <p class="mx-2 mt-2">Ver todos</p>
            </a>
        </div>


    </div>
    <div class="container">
        <div class="d-flex flex-row justify-content-between mb-2">
            <h4 class="text-secondary ml-6 text-xl">{{ $manual->titulo }}</h4>
            <a href="{{ asset($manual->urlDocumento) }}" data-id="{{ $manual->id }}" data-tipo="manual" download>
                <button id="btnDescargar" class="btn btn-sm btn-warning gothamB text-white rounded-pill btn-xxsm">DESCARGAR</button>
            </a>
        </div>
        <hr>
        <div class="d-flex flex-column align-items-center mt-4">
            
            <iframe src="{{ asset($manual->urlDocumento) }}" frameborder="0" width="80%" height="900px"></iframe>
        </div>
    </div>
    <script src="{{ asset('assets/js/descargasHandler.js')}}" type="module"></script>     
@endsection

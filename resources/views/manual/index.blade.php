@extends('layouts.base')
@section('content')
@section('titulo_seccion', 'MANUALES')

    <div class="container mt-4">

        <div class="row">

            @forelse ( $manuales as $manual)
            <div class="col-lg-3 col-md-6 mb-4 cardEffect">
                <div class="card align-items-center p-2 border-none" >
                    {{-- <p class="text-secondary"><b>{{ $manual->titulo }}</b></p> --}}
                    <img src="{{ $manual->urlImagen }}" class="" alt="Manual img" width="100px" height="150px">
                    <ul class="list-group list-group-flush align-items-center gothamB">
                        <li class="list-group-item">
                            <a href="{{ $manual->urlDocumento }}" data-id="{{ $manual->id }}" data-tipo="manual" download>
                                <button id="btnDescargar" type="button"
                                class="btn btnCardManual btnDescargarManual btn-block btn-sm rounded-pill px-3">DESCARGAR</button>
                            </a>
                        </li>
                        <li class="list-group-item pt-0">
                            <a href="{{ route('manual.show',['manual'=> $manual->id])  }}">
                                <button type="button" id="btnVerPDF"
                                    class="btn btnCardManual btnVerManual btn-outline-primary btn-block btn-sm rounded-pill px-3">
                                    VER EN LÍNEA
                                </button>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
                
            @empty
                <h4>NINGUN MANUAL POR MOSTRAR</h4>
            @endforelse
            @section('pagination')
            {{ $manuales->links('pagination::simple-bootstrap-5') }}
        @endsection

        </div>
    </div>
    <script src="{{ asset('assets/js/descargasHandler.js')}}" type="module"></script> 
    @endsection

@extends('layouts.base')
@section('content')
@section('titulo_seccion', 'CATALOGOS')

    <div class="container mt-4">

        <div class="row">

            @forelse ( $catalogos as $catalogo)
            <div class="col-lg-3 col-md-6 mb-4 cardEffect">
                <div class="card align-items-center border-0" style="width: 100%;">
                    <img src="{{ $catalogo->urlThumb }}" class="" alt="catalogo img" width="100px" height="150px">
                    <ul class="list-group list-group-flush align-items-center gothamB">
                        <li class="list-group-item">
                            <a href="{{ $catalogo->urlPDF }}" download="{{ $catalogo->titulo . ".pdf" }}">
                                <button type="button"
                                class="btn btn-warning text-morado hover:text-white btn-block btn-sm rounded-pill px-3">DESCARGAR</button>
                            </a>
                        </li>
                        <li class="list-group-item pt-0">
                            <a href="{{ route('catalogo.show',['catalogo'=> $catalogo->id])  }}">
                                <button type="button" id="btnVerPDF"
                                    class="btn btn-outline-primary btn-block btn-sm rounded-pill px-3">
                                    VER EN LÍNEA
                                </button>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
                
            @empty
                <h4>NINGUN CATALOGO POR MOSTRAR</h4>
            @endforelse
            @section('pagination')
            {{ $catalogos->links('pagination::simple-bootstrap-5') }}
        @endsection

        </div>
    </div>
    @endsection

@extends('layouts.base')
@section('content')
@section('titulo_seccion', 'FORMATOS')

    <div class="container mt-4">

        <div class="row">

            @forelse ( $formatos as $formato)
            <div class="col-lg-3 col-md-6 mb-4 cardEffect">
                <div class="card align-items-center border-0" style="width: 100%;">
                    <img src="{{ $formato->urlImagenThumb }}" class="" alt="Formato img" width="100px" height="150px">
                    <ul class="list-group list-group-flush align-items-center gothamB">
                        <li class="list-group-item d-flex flex-col align-items-center justify-content-center ">
                            <p>{{ $formato->titulo }}</p>
                            <a href="{{ $formato->urlDocumento }}" download="{{ $formato->titulo . ".pdf" }}">
                                <button type="button"
                                class="btn btn-warning text-morado hover:text-white btn-block btn-sm rounded-pill px-3">DESCARGAR</button>
                            </a>
                        </li>
                        <li class="list-group-item pt-0">
                            {{-- <a href="{{ route('formato.show',['formato'=> $formato->id])  }}">
                            </a> --}}
                        </li>
                    </ul>
                </div>
            </div>
                
            @empty
                <h4>NINGUN FORMATO POR MOSTRAR</h4>
            @endforelse
            @section('pagination')
            {{ $formatos->links('pagination::simple-bootstrap-5') }}
        @endsection
        </div>
    </div>
    @endsection
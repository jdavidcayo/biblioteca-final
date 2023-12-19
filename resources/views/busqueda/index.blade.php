@extends('layouts.base')

@section('titulo_seccion', 'Busqueda')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="d-flex justify-content-center align-items-center">
                    
                    {{ $resultadosPaginados->links('pagination::simple-bootstrap-5') }}
                
                    <table class="table">
                        <thead>
                            <tr>
                                <th>TIPO</th>
                                <th>TITULO</th>
                                <th>SÍNTESIS</th>
                                <th>LINK</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ( $resultadosPaginados as $resultado )
                            <tr>
                                <td>{{ $tiposModelo[$resultado->tipo] }}</td>
                                <td>{{ $resultado->titulo }}</td>
                                <td class="limitedCell">{!! $resultado->descripcion !!}</td>
                                <td>
                                <a href="{{ $resultado->link }}">
                                    {{-- mostrar Descargar en caso de ser formato--}}
                                    {{-- 
                                    $tiposModelo = [ 
                                        1 => 'Capsula',
                                        2 => 'Catalogo',
                                        3 => 'Compendio',
                                        4 => 'Folleto',
                                        5 => 'Documento',
                                        6 => 'Formato',
                                        7 => 'Manual',
                                    ];    
                                    --}}
                                    @if ( $resultado->tipo == 6)
                                        Descargar
                                    @else
                                        Ver
                                    @endif
                                </a>    
                                </td>
                            </tr>
                            @empty
                                
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection



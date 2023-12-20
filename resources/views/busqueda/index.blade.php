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
                                <a href=
                                    
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

                                    @switch($resultado->tipo)
                                        @case(1)
                                            '{{ route('capsula.show', $resultado) }}'
                                            @break
                                        @case(2)
                                            '{{ route('catalogo.show', $resultado) }}'
                                            @break
                                        @case(3)
                                            '{{ route('compendio.show', $resultado) }}'        
                                            @break
                                        @case(4)
                                            '{{ route('folleto.show', $resultado) }}'    
                                            @break
                                        @case(5)
                                            '{{ route('documento.show', $resultado) }}'
                                            @break
                                        @case(6)
                                            '{{ route('formato.show', $resultado) }}'
                                            @break
                                        @case(7)
                                            '{{ route('manual.show', $resultado) }}'
                                            @break
                                        @default
                                            '#'
                                    @endswitch
                                > VER MÁS
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



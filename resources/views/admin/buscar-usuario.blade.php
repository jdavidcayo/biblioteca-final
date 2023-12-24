@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h3>FILTRO POR USUARIO</h3>
@stop

@section('content')
    @php
        $tiposDescarga = [
            'catalogos' => 1,
            'compendios' => 2,
            'documentos' => 3,
            'formatos' => 4,
            'manuales' => 5,
        ];
    @endphp
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                @if ($usuarioEncontrado)
                    <h3>{{ $usuarioEncontrado->name }}</h3>

                    @if ($descargasUsuario->count() > 0)
                        <p>Ultimas descargas del usuario</p>
                        <div class="table-responsive">
                            <table class="table table-bordered" style="font-size: medium;">
                                <thead>
                                    <tr>
                                        <th>Tipo</th>
                                        <th>Nombre del archivo</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($descargasUsuario->take(20) as $index => $descarga)
                                        <tr>
                                            <td style="font-size: small;">
                                                {{ array_search($descarga->tipo, $tiposDescarga) }}
                                            </td>
                                            <td style="font-size: small;">{{ $nombresArchivos[$index] }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        

                        @php
                            $contadoresTipos = array_fill_keys(array_values($tiposDescarga), 0);
                        @endphp

                        @foreach ($descargasUsuario as $descarga)
                            @if (isset($contadoresTipos[$descarga->tipo]))
                                @php
                                    $contadoresTipos[$descarga->tipo]++;
                                @endphp
                            @endif
                        @endforeach
                    @else
                        <p>El usuario no ha realizado ninguna descarga.</p>
                    @endif
                @else
                    <p>Usuario no encontrado.</p>
                @endif
            </div>

            <div class="col-md-6">
                <canvas id="descargasChart" width="300" height="300" style="max-height: 400px"></canvas>
            </div>
        </div>
    </div>


@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        @if ($usuarioEncontrado)

        var contadoresTipos = {};
        @foreach ($tiposDescarga as $nombreTipo => $idTipo)
            contadoresTipos['{{ $nombreTipo }}'] = {{ $contadoresTipos[$idTipo] }};
        @endforeach

            var ctxDescargas = document.getElementById('descargasChart').getContext('2d');
            var descargasChart = new Chart(ctxDescargas, {
                type: 'doughnut',
                data: {
                    labels: Object.keys(contadoresTipos),
                    datasets: [{
                        data: Object.values(contadoresTipos),
                        backgroundColor: ['#FF6384', '#36A2EB', '#FFCE56', '#4CAF50', '#9966FF'],
                        hoverBackgroundColor: ['#FF6384', '#36A2EB', '#FFCE56', '#4CAF50', '#9966FF']
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false
                }
            });
        @else
            console.log('Usuario no encontrado. No se generará el gráfico.');
        @endif
    </script>



@stop

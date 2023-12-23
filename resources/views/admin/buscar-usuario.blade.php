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
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Tipo</th>
                                        <th>Nombre del archivo</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($descargasUsuario->take(20) as $index => $descarga)
                                        <tr>
                                            <td>{{ array_search($descarga->tipo, $tiposDescarga) }}</td>
                                            <td>{{ $nombresArchivos[$index] }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <p>El usuario no ha realizado ninguna descarga.</p>
                    @endif
                @else
                    <p>Usuario no encontrado.</p>
                @endif
            </div>

            <div class="col-md-6">
                <canvas id="descargasChart" width="300" height="300"></canvas>
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
        
        var tiposDescargaLabels = @json(array_keys($tiposDescarga));
        var descargasCantidad = @json(array_values(
                $descargasUsuario->pluck('tipo')->countBy()->all()));
        
        var coloresTipos = ['#FF6384', '#36A2EB', '#FFCE56', '#4CAF50', '#9966FF'].slice(0, tiposDescargaLabels.length);

        var ctxDescargas = document.getElementById('descargasChart').getContext('2d');
        var descargasChart = new Chart(ctxDescargas, {
            type: 'doughnut',
            data: {
                labels: tiposDescargaLabels,
                datasets: [{
                    data: descargasCantidad,
                    backgroundColor: coloresTipos,
                    hoverBackgroundColor: coloresTipos
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false
            }
        });
    </script>
@stop

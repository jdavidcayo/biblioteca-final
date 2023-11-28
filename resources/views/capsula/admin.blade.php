@extends('adminlte::page')

@section('title', 'Capsulas informativas')

@section('content_header')

    <a href="{{ route('capsulas.create') }}" class="btn btn-outline-primary "> NUEVA CAPSULA</a>
    <hr>

    <table id="dataTable" class="display">
        <thead>
            <tr>
                <th>ID</th>
                <th>TITULO</th>
                <th>TEMA</th>
                <th>AUTOR</th>
                <th>FECHA</th>
                <th>ACCIONES</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($capsulas as $capsula)
                <tr>
                    <td>{{ $capsula->id }}</td>
                    <td>{{ $capsula->titulo }}</td>
                    <td>{{ $capsula->tema }}</td>
                    <td>{{ $capsula->autor->name }}</td>
                    <td>{{ $capsula->created_at }}</td>
                    <td>
                        <a href="{{ route('capsulas.show', $capsula) }}" class="btn btn-primary">Ver</a>
                        <a href="{{ route('capsulas.edit', $capsula) }}" class="btn btn-secondary">Editar</a>
                        <form action="{{ route('capsulas.destroy', $capsula) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" type="submit">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5">No hay capsulas</td>
                </tr>
            @endforelse

        </tbody>
    </table>

@stop

@section('content')

@stop

@section('css')
    <link rel="stylesheet" href=" {{ asset('assets/css/jquery.dataTables.css') }}">

@stop

@section('js')

    <script src="{{ asset('assets/js/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('assets/js/dataTables.bootstrap5.min.js') }}"></script>
    <script>
        new DataTable('#dataTable');
    </script>

@stop

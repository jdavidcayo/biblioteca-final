@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h3>USUARIOS</h3>
@stop

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">

                        <a href="{{ route('usuarios.create') }}"
                            class="btn btn-primary  btn-block d-flex justify-content-start font-gothamBold" data-placement="left">
                            + NUEVO
                        </a>

                        <div class="flex flex-row items-center text-center border-1  overflow-hidden border-none mt-2 bg-white h-8 ">
                            <input type="text" autocomplete="off"
                                class="w-full h-full text-crema placeholder-gray-400 border-none" />
                            <img src="{{ asset('assets/img/Buscar.png') }}" alt="Logo usuario" class="h-8 border-none" width="25px"/>
                        </div>

                    </div>


                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>ID</th>

                                        <th>Nombre</th>
                                        <th>Organizacion</th>
                                        <th>Email</th>
                                        <th>Rol</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($usuarios as $usuario)
                                        <tr>
                                            <td>{{ $usuario->id }}</td>

                                            <td>{{ $usuario->name }}</td>
                                            <td>{{ $usuario->organizacion }}</td>
                                            <td>{{ $usuario->email }}</td>
                                            <td>{{ $usuario->rol }}</td>

                                            <td>
                                                <a class="btn btn-sm btn-primary "
                                                    href="{{ route('usuarios.show', $usuario->id) }}"><i
                                                        class="fa fa-fw fa-eye"></i> MOSTRAR</a>
                                                <a class="btn btn-sm btn-success"
                                                    href="{{ route('usuarios.edit', $usuario->id) }}"><i
                                                        class="fa fa-fw fa-edit"></i> EDITAR</a>
                                                <form action="{{ route('usuarios.destroy', $usuario->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i
                                                            class="fa fa-fw fa-trash"></i> ELIMINAR</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {{-- {!! $users->links() !!} --}}
            </div>
        </div>
    </div>

@stop

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/styles.css') }}">
    @livewireStyles()
@stop

@section('js')
    
@stop

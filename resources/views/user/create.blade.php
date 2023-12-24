@extends('adminlte::page')

@section('title', 'Usuarios')

@section('content_header')
<h3 class="text-secondary my-2 px-2" style="background-color: #fcd5c9">USUARIOS</h3>
@stop

@section('content')
<section class="content container-fluid">
    
    <div class="row flex justify-content-center mt-4">
        <div class="col-md-10">

            <div class="card card-default">
                <div class="card-header bg-admin-card-title ">
                    <span class="card-title font-gothamBold">NUEVO USUARIO</span>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('usuarios.store') }}"  role="form" enctype="multipart/form-data" id="formCreate">
                        @csrf

                        <div class="box box-info padding-1">
                            <div class="box-body">
                                
                                <div class="form-group">
                                    <label class="text-secondary">Nombre</label>
                                    <input type="text" name='name' class="form-control" placeholder="Nombre" required>
                                </div>
                                
                                <div class="form-group">
                                    <label class="text-secondary">Email</label>
                                    <input type="email" name='email' class="form-control" placeholder="Email" required>
                                </div>
                                
                                <div class="form-group">
                                    <label class="text-secondary">Contraseña</label>
                                    

                                    <div class="input-group mb-3">
                                        <input type="password" name='password' class="form-control" id="inputPwd"
                                            placeholder="Contraseña" required >
                                            <span class="input-group-text" id="showIcon" onclick="togglePasswordVisibility()">
                                                <i class="fas fa-eye"></i>
                                    </div>
                                    <button
                                        class="btn btn-sm btn-outline-primary rounded-pill mt-1" id="btnGenerar">GENERAR NUEVA</button>
                                </div>

                                
                                <div class="form-group">
                                    <label class="text-secondary">Rol</label>
                                    <select name="rolSelect" id="rolSelect" class="form-control item">
                                        @foreach ($roles as $rol)
                                            <option value="{{ $rol->id }}">{{ $rol->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                            </div>
                            <div class="box-footer mt20">
                                <button type="submit" class="btn btn-primary ">CREAR</button>
                                <a href="{{ route( "usuarios.index" )}}" class="btn btn-secondary">CANCELAR</a>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

@stop

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
    
    <link rel="stylesheet" href=" {{ asset('assets/css/styles.css') }}">
@stop

@section('js')

<script>
    document.addEventListener('DOMContentLoaded', function () {
        document.getElementById('btnGenerar').addEventListener('click', function (e) {
            e.preventDefault();
            let token = document.querySelector('#formCreate input[name="_token"]').value;

            fetch("{{ route('usuario.generatepwd.admin') }}", {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': token,
                },
            })
            .then(response => response.json())
            .then(data => {
                document.querySelector('#formCreate input[name="password"]').value = data.password;
            })
            .catch(error => {
                console.error('Error al realizar la solicitud Fetch.', error);
            });
        });
    });
    
</script>

<script>
    function togglePasswordVisibility() {
        var passwordField = document.getElementById('inputPwd');
        var showIcon = document.getElementById('showIcon');

        if (passwordField.type === 'password') {
            passwordField.type = 'text';
            showIcon.innerHTML = '<i class="fas fa-eye-slash"></i>';
        } else {
            passwordField.type = 'password';
            showIcon.innerHTML = '<i class="fas fa-eye"></i>';
        }
    }
</script>

@stop


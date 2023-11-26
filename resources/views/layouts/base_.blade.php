<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Biblioteca IEEG</title>

    @livewireStyles
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}"> 
    <link rel="stylesheet" href="{{ asset('assets/css/styles.css') }}">

</head>
<body>
    <header>
        <div id="app">
            <nav class="navbar navbar-expand-md navbar-light bg-morado shadow-sm">
                <div class="container col-lg-12">
    
                    <a class="navbar-brand col-lg-2" href="{{ url('/inicio') }}">
                        <img src="{{ asset('assets/img/Logo-IEEG.png') }}" alt="Logo ieeg" width="120px">
                    </a>
                    <h5 class="text-crema gothamB">Biblioteca Digital del Régimen Especial Sancionador</h5>
                    <div>
                        <div class="d-flex align-items-center">
                    <ul class="navbar-nav mx-auto">
                        <!-- Authentication Links -->
                    @if (Auth::check())
                        <li class="nav-item mx-4  mt-4 text-white gotham">Hola <span class="gothamB">{{ Auth::user()->name }}</span></li>
                    @endif
                    <img class="avatar img-thumbnail m-3 rounded-circle" style="width: 50px; height: 50px; border: 3px solid #b3345b;" src="{{ asset('assets/img/AvatarH.png') }}">
                    </ul>
                    </div>
                    <div class="input-with-icon d-inline-block position-relative" style="width: 96%;">
                        <input class="busquedas w-100 box-sizing-border-box rounded-pill" type="text" name="Busquedas" id="Busquedas" placeholder="Búsqueda" 
                        style="padding: 10px 40px 10px 10px; border: 1px solid #ccc; height: 40px;">
                        <button type="submit" class="lupa__button btn btn-transparent p-0 border-0 position-absolute translate-middle-y top-50" style="right: 2px;">
                            <img class="img__buscar mx-0 img-fluid" style="width: 40px;" src="{{ asset('assets/img/Buscar.png') }}" alt="Lupa">
                        </button>
                    </div>
                </div>
            </nav>
        </div>
            <!-- Nueva sección para la segunda navbar -->
    
            {{-- <section>
                <nav class="navbar navbar-expand-lg navbar-light bg-primary">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent2" aria-controls="navbarSupportedContent2" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent2">
                    <ul class="navbar-nav mx-auto justify-content-center text-crema">
                        <li class="nav-item mx-4">
                            <a href="{{ route('manual.index') }}" class="text-decoration-none text-crema">
                                MANUALES
                            </a>
                        </li>
                        <li class="nav-item mx-4">
                            <a href="{{ route('folleto.index') }}" class="text-decoration-none text-crema">
                                FOLLETOS
                            </a>
                        </li>
                        <li class="nav-item mx-4">
                            <a href="{{ route('formato.index') }}" class="text-decoration-none text-crema">
                                FORMATOS
                            </a>
                        </li>
                        <li class="nav-item mx-4">
                            <a href="{{ route('catalogo.index') }}" class="text-decoration-none text-crema">
                                CATÁLOGOS
                            </a>
                        </li>
                        <li class="nav-item mx-4">
                        <a href="{{ route('documento.index') }}" class="text-decoration-none text-crema">
                                DOCUMENTOS
                            </a>
                        </li>
                        <li class="nav-item mx-4">
                            <a href="{{ route('capsula.index') }}" class="text-decoration-none text-crema">
                                CÁPSULAS
                            </a>
                        </li>
                        
                    </ul>
                </div>
            </nav>
        </section> --}}
    </div> 
</header>


<main class="container d-flex flex-column py-4">
    @yield('content')
</main>


<footer class="p-1 d-flex justify-content-center align-content-center " style="background-color: #dfdede">
    <p class="text-secondary gothamText footer" style="margin-top:40px">IEEG 2018 - 800 433 4486 - Carretera Guanajuato Puentecillas km.
        2 + 767, Colonia Puentecillas - C.P. 36263 - Guanajuato, Gto. - Conmutador (473) 735-3000.</p>
</footer>

    @livewireScripts
    {{-- <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script> --}}

</body>
</html>
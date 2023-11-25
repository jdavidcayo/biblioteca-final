<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ieeg</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
    <link href="{{ asset('assets/css/styles.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/folletos.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/navExport.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/inicio.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/manuales.css') }}">

</head>
<body>
    <header>
        <div class="font-gothamBold bg-morado flex justify-between">
            <img class="img__inicio m-8" src="{{ asset('assets/img/Logo-IEEG.png') }}" alt="Imagen de inicio">
            <div class="font-gothamBold text-2xl text-crema pt-20">Biblioteca Digital del Régimen Especial Sancionador</div>
        <div>
            <div class="user__login">
                <h5>Hola <span>Constanza Cruz</span></h5>
                <img class="avatar" src="{{ asset('assets/img/AvatarM.png') }}">
            </div>
            <div class="input-with-icon">
                <input class="busquedas" type="text" name="Busquedas" id="Busquedas" placeholder="Búsqueda">
                <button type="submit" class="lupa__button">
                    <img class="img__buscar" src="{{ asset('assets/img/Buscar.png') }}" alt="Lupa">
                </button>
            </div>
        </div>
    </div>
        <section class="flex flex-row bg-morado justify-center p-4">
            <nav class="nav">
                <ul class="flex flex-row justify-between gap-4 font-gotham text-crema">
                    <li>MANUALES</li>
                    <li>FOLLETOS</li>
                    <li>FORMATOS</li>
                    <li>CATÁLOGOS</li>
                    <li>DOCUMENTOS</li>
                    <li>COMPENDIOS</li>
                    <li>CÁPSULAS</li>
                </ul>
            </nav>
        </section>
    </header>

    @yield('content')

    <footer>
        <div class="contacto__footer">
                <p class="copry">IEEG 2018 - 800 433 4486 - Carretera Guanajuato Puentecillas km. 2 + 767, Colonia Puentecillas - C.P. 36263 - Guanajuato, Gto. - Conmutador (473) 735-3000.</p>
        </div>
    </footer>
    @livewireScripts
</body>

</html>
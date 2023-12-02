<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}"> 
        <link rel="stylesheet" href="{{ asset('assets/css/styles.css') }}">
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- Styles -->
        @livewireStyles
    </head>
    <body class="font-gotham antialiased">
        <x-banner />

        <div class="min-h-screen bg-gray-100">
            @livewire('navigation-menu')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        @yield('header')
                    </div>
                </header>
            @endif
            <!-- section title pagination -->
            <section class="container">
                <h3 class="text-secondary">@yield('titulo_seccion')</h3>
        <!-- Pagination Section -->
            <div class="container mt-4">
                <div class="d-flex justify-content-end">
               @yield('pagination')
            </div>
            </div>
            </section>
            <!-- Page Content -->
            <main class="min-vh-100">

                @yield('content')
            </main>
        <!-- Footer Section -->
        <footer class="bg-crema text-secondary py-3 text-center">
            <p>&copy; {{ date('Y') }} {{ config('app.name', 'Laravel') }}IEEG 2018 - 800 433 4486 - Carretera Guanajuato Puentecillas km. 2 + 767, Colonia Puentecillas - C.P. 36263 - Guanajuato, Gto. - Conmutador (473) 735-3000.
            </p>
        </footer>
        </div>

        @stack('modals')

        @livewireScripts
    </body>
</html>
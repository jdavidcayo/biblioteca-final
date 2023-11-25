@extends('layouts.base')
@section('content')
    <div>
        <main>
            <a href="/manuales">
                <div class="container__main"
                style="background-image: url('{{ asset('assets/img/inicio/Mosaico-Manuales.png') }}'); width: 350px; height: 300px; background-size: cover;">
                <div class="flex flex-row justify-center items-end text-2xl text-morado font-gothamBold mt-auto mb-15 m-2">
                    <div class="info"></div>
                    <img class="iconos" src="{{ asset('assets/img/inicio/ICONO-Manuales.png') }}" alt="icono manuales">MANUALES
                </div>
                <p class="text-morado font-gothamMedium text-base p-4 ">Manuales de operación de apoyo para la integración de un procedimiento especial
                    sancionador y las notificaciones en el instituto.</p>
                </div>
            </a>

            <a href="/folletos">
                <div class="container__main"
                style="background-image: url('{{ asset('assets/img/inicio/Mosaico-Folletos.png') }}'); width: 350px; height: 300px; background-size: cover;">
                <p class="titulos2">
                    <img class="iconos" src="{{ asset('assets/img/inicio/ICONO-Folletos.png') }}"
                    alt="icono folleto">FOLLETOS
                </p>
                </div>
            </a>

            <a href="/formatos">
                <div class="container__main"
                style="background-image: url('{{ asset('assets/img/inicio/Mosaico-Formatos.png') }}'); width: 350px; height: 300px; background-size: cover;">
                <p class="titulos1">
                    <img class="iconos" src="{{ asset('assets/img/inicio/ICONO-Formatos.png') }}"
                    alt="icono formatos">FORMATOS
                </p>
                </div>
            </a>


            <div class="container__main"
                style="background-image: url('{{ asset('assets/img/inicio/Mosaico-Catalogos.png') }}'); width: 350px; height: 300px; background-size: cover;">
                <p class="titulos2">
                    <img class="iconos" src="{{ asset('assets/img/inicio/ICONO-Catalogo.png') }}"
                        alt="icono catálogos">CATÁLOGOS
                </p>
            </div>
            <div class="container__main"
                style="background-image: url('{{ asset('assets/img/inicio/Mosaico-Documentos.png') }}'); width: 350px; height: 300px; background-size: cover;">
                <p class="titulos1">
                    <img class="iconos" src="{{ asset('assets/img/inicio/ICONO-Documentos.png') }}"
                        alt="icono documentos">DOCUMENTOS
                </p>
            </div>
            <div class="container__main"
                style="background-image: url('{{ asset('assets/img/inicio/Mosaico-Compendios.png') }}'); width: 350px; height: 300px; background-size: cover;">
                <p class="titulos2">
                    <img class="iconos" src="{{ asset('assets/img/inicio/ICONO-Compendios.png') }}"
                        alt="icono compendios">COMPENDIOS
                </p>
            </div>
        </main>


        <section x-data="{ activeSlide: 0 }">
            <div id="carouselExampleControls" class="relative" x-data="{ activeSlide: 0 }">
                <!-- Carousel items -->
                <div class="relative w-full overflow-hidden after:clear-both after:block after:content-['']">
                    <!-- Primer item -->
                    <div x-show="activeSlide === 0"
                        class="relative float-left -mr-[100%] w-full transition-transform duration-[600ms] ease-in-out motion-reduce:transition-none">
                        <div class="capsulas__inf">
                            <p class="cap__tit">CÁPSULAS INFORMATIVAS</p>
                            <div class="lista__reproduccion">
                                <iframe width="560" height="315" src="https://www.youtube.com/embed/NI6aOFI7hms"
                                    frameborder="0" allowfullscreen></iframe>
                                <div class="desc__video">
                                    <p class="tit__vid">Título del video</p>
                                    <p class="sub__vid">Octubre 19, 2023</p>
                                    <hr>
                                    <p class="des__vid" style="margin-top: 30px">Descripción del video. En esta ocasión
                                        tenemos de invitada en Voces de la
                                        Democracia a la Lic. Adriana Arroyo
                                        Florentino quien, con su experiencia como
                                        integrante de la red de refugios y tallerista
                                        en temas de violencia, nos invita a la
                                        reflexión sobre las modalidades y características de la violencia, así como los
                                        principios de la cultura de la paz.</p>
                                </div>
                            </div>
                            <div class="cont__btn">
                                 <button
                    class="w-full bg-blanco text-morado border border-fucsia rounded-full font-gotham m-2 pl-3 pr-3 hover:font-gothamBold hover:border-morado focus:font-gothamBold focus:border-morado">VER MAS</button>
                            </div>
                        </div>
                    </div>
                    <!-- Segundo item y otros slides aquí -->
                </div>

                <!-- Controles del carrusel - ítem anterior -->
                <button @click="activeSlide = (activeSlide - 1 + 3) % 3"
                    class="absolute bottom-0 left-0 top-0 z-[1] flex w-[15%] items-center justify-center border-0 bg-none p-0 text-center text-white opacity-50 transition-opacity duration-150 ease-[cubic-bezier(0.25,0.1,0.25,1.0)] hover:text-white hover:no-underline hover:opacity-90 hover:outline-none focus:text-white focus:no-underline focus:opacity-90 focus:outline-none motion-reduce:transition-none"
                    type="button">
                    <span class="inline-block h-8 w-8">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="h-6 w-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
                        </svg>
                    </span>
                    <span
                        class="!absolute !-m-px !h-px !w-px !overflow-hidden !whitespace-nowrap !border-0 !p-0 ![clip:rect(0,0,0,0)]">Anterior</span>
                </button>

                <!-- Controles del carrusel - siguiente ítem -->
                <button @click="activeSlide = (activeSlide + 1) % 3"
                    class="absolute bottom-0 right-0 top-0 z-[1] flex w-[15%] items-center justify-center border-0 bg-none p-0 text-center text-white opacity-50 transition-opacity duration-150 ease-[cubic-bezier(0.25,0.1,0.25,1.0)] hover:text-white hover:no-underline hover:opacity-90 hover:outline-none focus:text-white focus:no-underline focus:opacity-90 focus:outline-none motion-reduce:transition-none"
                    type="button">
                    <span class="inline-block h-8 w-8">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="h-6 w-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                        </svg>
                    </span>
                    <span
                        class="!absolute !-m-px !h-px !w-px !overflow-hidden !whitespace-nowrap !border-0 !p-0 ![clip:rect(0,0,0,0)]">Siguiente</span>
                </button>
            </div>
        </section>

        <script type="text/javascript" src="../node_modules/tw-elements/dist/js/tw-elements.umd.min.js"></script>

    </div>
@endsection

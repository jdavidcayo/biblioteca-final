@extends('layouts.base')

@section('content')
@section('titulo_seccion', 'FOLLETOS')

    <div class="container mt-4">
        <div class="row">
            <div class="col-12">
                {{ $folletos->links('pagination::simple-bootstrap-5') }}
            </div>
        </div>
        <div class="row">

            @forelse ($folletos as $folleto)
                <div class="col-lg-3 col-md-6 mb-4 cardEffect">
                    <a href="#" data-bs-toggle="modal" data-bs-target="#miModal" id="link">
                        <span hidden>{{ $folleto->id }}</span>
                        <div class="card align-items-center border-0 bg-gray-100" style="width: 100%;">
                            <img src="{{ asset($folleto->urlImagenThumb); }}" class="" alt="Folleto img" width="200px" height="200px">
                            <h6 class="limitedText text-secondary mt-2"> {{ $folleto->titulo }}</h6>
                        </div>
                    </a>
                </div>


            @empty
                <h4>NINGUN FOLLETO POR MOSTRAR</h4>
            @endforelse
            @section('pagination')
            {{ $folletos->links('pagination::simple-bootstrap-5') }}
        @endsection
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade bg-danger opacity-80" id="miModal" tabindex="-1" aria-labelledby="Modal" aria-hidden="true">
        <h2 class="d-block text-white mt-5 ml-5 mb-2">{{ ($folleto->titulo) }}</h2>

        {{-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button> --}}
        <hr class="text-white border-3">    
        <div class="modal-dialog d-flex align-items-center vh-100">
            <div class="modal-content p-0 m-0">
                <div class="modal-body p-0 m-0">

                    <div id="carousel" class="carousel slide">
                        <div class="carousel-inner">
                            @forelse ($folletos as $folleto)
                                {{-- <div class="carousel-item @if ($loop->first) active @endif"> --}}
                                    <div class="carousel-item" id="{{ $folleto->id }}">
                                    <img src="{{ asset($folleto->urlImagen) }}" class="d-block" alt="folleto" height="640px">
                                </div>
                                
                
                            @empty
                                <h3>NO HAY IMAGENES</h3>
                            @endforelse
 
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carousel"
                            data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carousel"
                            data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <script>
        let folletos = document.querySelectorAll('#link');
        folletos.forEach(folletoLink => {
            folletoLink.addEventListener('click', (e) => {
                let span = folletoLink.querySelector('span');
                let id = span.textContent;
                let carouselItem = document.getElementById(id);
                carouselItem.classList.add('active');
            })
        });
        
    </script>
@endsection

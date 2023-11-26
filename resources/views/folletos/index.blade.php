@extends('layouts.base')

@section('content')
    <div class="container">
        <h3 class="text-secondary ">MANUALES</h3>
    </div>
    <div class="container mt-4">

        <div class="row">

            @forelse ($folletos as $folleto)
                <div class="col-lg-3 col-md-6 mb-4 cardEffect">
                    <a href="#" data-bs-toggle="modal" data-bs-target="#miModal">
                        <div class="card align-items-center border-0 " style="width: 100%;">
                            <img src="{{ $folleto->url }}" class="" alt="Manual img" width="200px" height="200px">
                            <h6 class="limitedText text-secondary mt-2"> {{ $folleto->titulo }}</h6>
                        </div>
                    </a>
                </div>


            @empty
                <h4>NINGUN FOLLETO POR MOSTRAR</h4>
            @endforelse



        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="miModal" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
        <div class="modal-dialog ">
            <div class="modal-content p-0 m-0">
                <div class="modal-body p-0 m-0">

                    <div id="carousel" class="carousel slide">
                        <div class="carousel-inner">
                            @forelse ($folletos as $follet)
                                <div class="carousel-item @if ($loop->first) active @endif">
                                    <img src="{{ $follet->url }}" class="d-block w-100" alt="...">
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
@endsection

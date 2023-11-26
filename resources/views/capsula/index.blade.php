@extends('layouts.base')

@section('content')
    <div class="container">
        <h3 class="text-secondary ">CAPSULAS INFORMATIVAS</h3>
    </div>
    <div class="container mt-4">

        <div class="row">

            @forelse ($capsulas as $capsula)
                <div class="col-lg-3 col-md-6 mb-4 cardEffect">
                    <a href="#" data-bs-toggle="modal" data-bs-target="#miModal" class="text-decoration-none ">
                        <div class="card align-items-center border-0 " style="width: 100%;">
                            <span id="url" hidden>{{ $capsula->url }}</span>
                            <img src="{{ $capsula->urlImagen }}" class="" alt="Capsula thumbnail" width="200px"
                                height="200px">
                            <h6 class="limitedText text-secondary mt-2 mb-0 "> {{ $capsula->titulo }}</h6>
                            <p class="text-secondary fs-xxsm text-decoration-none ">Noviembre 19 de 2023</p>
                            <p id="capsulaDescription" hidden>{{ $capsula->descripcion }}</p>
                    </a>
                </div>

        </div>

        @empty
        <h4>NINGUN FOLLETO POR MOSTRAR</h4>
        @endforelse


    </div>
    </div>

    <!-- Modal -->
    <div class="modal fade " id="miModal" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
        <div class="modal-dialog ">
            <div class="modal-content p-0 m-0">
                <div class="modal-body p-0 m-0">


                    <div>
                        <iframe width="100%" height="400px"
                            id="videoIframe"
                            src="https://www.youtube.com/embed/hwl_CnXlOtc?si=tjpb26liwkVfCl-6" title="YouTube video player"
                            frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                            allowfullscreen></iframe>
                    </div>
                    <h5 class="gothamB text-secondary px-4 " id="modalTitle"></h5>
                    <hr>
                    <p class="fs-6 px-4 text-secondary " id="modalDescription"></p>



                </div>
            </div>
        </div>
    </div>

    <script>
        let cards = document.querySelectorAll('#url');
        cards.forEach(element => {
            let link = element.parentElement;
            link.addEventListener('click', () => {
                let url = element.innerHTML;
                let iframe = document.querySelector('iframe');
                iframe.src = url;
                let modalTitle = document.querySelector('#modalTitle');
                modalTitle.textContent = link.querySelector('h6').textContent;

                let modalDescription = document.querySelector('#modalDescription');
                modalDescription.textContent = link.querySelector('#capsulaDescription').textContent;
            });
        });
        

        let videoIframe = document.getElementById("videoIframe");

        document.getElementById("miModal").addEventListener('show.bs.modal', function() {
            console.log('Modal mostrado');
        });

        // Función que se ejecuta cuando el modal se cierra
        document.getElementById("miModal").addEventListener('hidden.bs.modal', function() {
            
            if (videoIframe !== null) {
                var videoSrc = videoIframe.src;
                videoIframe.src = "";
                videoIframe.src = videoSrc;
            }
        });
    </script>
@endsection

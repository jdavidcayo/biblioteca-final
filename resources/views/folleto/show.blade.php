@extends('layouts.base')

@section('content')
@section('titulo_seccion', 'FOLLETO')

    <div class="container mt-4">
        <h2>{{ $folleto->titulo }}</h2>
        <hr class="py-3">
        <div class="container">
            <img src="{{ asset($folleto->urlImagen); }}" alt="Imagen">
        </div>

    </div>

        
@endsection

@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
<section class="content container ">
    <div class="row">
        <div class="col-md-12 ">

            @includeif('partials.errors')

            <div class="card card-default col-md-6">
                <div class="card-header">
                    <span class="card-title">{{ __('Create') }} User</span>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('usuarios.store') }}"  role="form" enctype="multipart/form-data">
                        @csrf

                        @include('user.form')

                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

@stop

@section('css')
    
@stop

@section('js')
    
@stop

@extends('layouts.app')

@section('template_title')
    {{ __('Create') }} Capsula
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                {{-- @includeif('partials.errors') --}}

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Create') }} Entrada</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('capsula.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            <div class="box box-info padding-1">
                                <div class="box-body">
                                    
                                    <div class="form-group">
                                        {{ Form::label('titulo') }}
                                        {{ Form::text('titulo', $capsula->titulo, ['class' => 'form-control' . ($errors->has('titulo') ? ' is-invalid' : ''), 'placeholder' => 'Titulo']) }}
                                        {!! $errors->first('titulo', '<div class="invalid-feedback">:message</div>') !!}
                                    </div>
                                    <div class="form-group">
                                        {{ Form::label('descripcion') }}
                                        {{ Form::text('descripcion', $capsula->descripcion, ['class' => 'form-control' . ($errors->has('descripcion') ? ' is-invalid' : ''), 'placeholder' => 'Descripcion']) }}
                                        {!! $errors->first('descripcion', '<div class="invalid-feedback">:message</div>') !!}
                                    </div>
                                    <div class="form-group">
                                        {{ Form::label('url') }}
                                        {{ Form::text('url', $capsula->url, ['class' => 'form-control' . ($errors->has('url') ? ' is-invalid' : ''), 'placeholder' => 'Url']) }}
                                        {!! $errors->first('url', '<div class="invalid-feedback">:message</div>') !!}
                                    </div>
                                    <div class="form-group">
                                        {{ Form::label('urlThumb') }}
                                        {{ Form::text('urlThumb', $capsula->urlThumb, ['class' => 'form-control' . ($errors->has('urlThumb') ? ' is-invalid' : ''), 'placeholder' => 'Urlthumb']) }}
                                        {!! $errors->first('urlThumb', '<div class="invalid-feedback">:message</div>') !!}
                                    </div>
                                    
                            
                                </div>
                                <div class="box-footer mt20">
                                    <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

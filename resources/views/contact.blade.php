@extends('adminlte::page')

@section('title', 'Blog')

@section('content_header')
    <h1 class="m-0 text-dark">Entre em contato Conosco</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <p class="mb-0">Caso aconteça algum erro ao usar o sistema entre em contato conosco</p>
                    @can('home.secret')
                        <a href="{{ route('secret') }}" target="blank">Link de Contato</a>
                    @endcan
                </div>
            </div>
        </div>
    </div>
@stop

@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1 class="m-0 text-dark">Criar Post</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{ route('posts.store') }}">
                        @csrf
                        @include('posts._form')
                        <button type="submit" class="btn btn-primary btn-block">Criar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop

@extends('adminlte::page')

@section('title', 'Blog')

@section('content_header')
    <h1 class="m-0 text-dark">Painel de Controle</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-4">
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title mb-2">Lista dos Posts Mais Comentados</h5>
                </div>
                <ul class="list-group list-group-flush">
                    @foreach ($mostCommented as $post)
                        <li class="list-group-item">
                            <a href="{{ route('posts.show', ['post' => $post->id]) }}">
                                {{ $post->title }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="col-8">
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title mb-2">Lista dos Usuários Mais Ativos</h5>
                </div>
                <ul class="list-group list-group-flush">
                    @foreach ($mostActive as $post)
                        <li class="list-group-item">
                            {{ $user->name }}
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@stop

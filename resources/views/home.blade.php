@extends('adminlte::page')

@section('title', 'Blog')

@section('content_header')
    <h1 class="m-0 text-dark">Painel de Controle</h1>
@stop

@section('content')
    <div class="row">
        <x-card>
            Posts Mais Comentados
            @slot('items')
                @foreach ($mostCommented as $post)
                    <li class="list-group-item">
                        <a href="{{ route('posts.show', ['post' => $post->id]) }}">
                            {{ $post->title }}
                        </a>
                    </li>
                @endforeach
            @endslot
        </x-card>
        <x-card>
            Usuários Mais Ativos
            @slot('items')
                @foreach ($mostActive as $user)
                <li class="list-group-item">
                    {{ $user->name }}
                </li>
                @endforeach
            @endslot
        </x-card>
        </div>
@stop

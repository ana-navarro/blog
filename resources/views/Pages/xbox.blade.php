@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1 class="m-0 text-dark">Noticias</h1>
@stop

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                @forelse ($posts as $post)
                    <h3>
                        <a href="{{ route('posts.show', ['post' => $post->id]) }}">{{ $post->title }}</a>
                    </h3>

                    {{ Str::limit( $value=$post->content, $limit=40, $end='...') }}
                    <a href="{{ route('posts.show', ['post'=>$post->id]) }}">Ler Mais</a> 

                    @if (Auth::check())                   
                        <form method="POST" class="fm-inline" action="{{ route('posts.destroy', ['post' => $post->id]) }}">
                            @csrf
                            @method('DELETE')
                            <a href="{{ route('posts.edit', ['post' => $post->id]) }}" class="btn btn-primary">
                                    Editar
                                </a>   
                            <input type="submit" value="Deletar" class="btn btn-primary"/>
                        </form>
                    @endif
                @empty
                    <p>Nenhum post publicado ainda</p>
                    <a href="{{ route('posts.create') }}"class="btn btn-primary">Adicionar um novo Post</a>
                @endforelse
            </div>
        </div>
    </div>
</div>
@endsection
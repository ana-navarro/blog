@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1 class="col-12 text-dark">{{ $post->title }}</h1>
    <p class="col-12 text-muted"> Criado {{\Carbon\Carbon::parse($post->created_at)->diffForHumans()}} por {{ $post->user->name }}</p>
@stop

@section('content')
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <p>{{$post->content}}</p>
                        @if (Auth::check())
                            <form method="POST" action="{{ route('posts.update', ['post' => $post->id]) }}">
                                {{ method_field('DELETE')}}
                                {{csrf_field()}}
                                <a href="{{route('posts.edit', ['post'=>$post->id])}}">Editar</a>
                                <input type="submit" class="btn btn-link" value="Delete" />
                            </form>
                        @endif
                </div>
            </div>
    </div>

    <h5>Comentários</h5>

    @forelse($post->comments as $comment)
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <p>{{ $comment->content }}</p>
                <p class="text-muted">
                    Adicionado em {{\Carbon\Carbon::parse($comment->created_at)->format('d/m/y')}}
                </p>
            </div>
        </div>
    </div>
    @empty
        <p>Nenhum comentário ainda!</p>
    @endforelse
@stop

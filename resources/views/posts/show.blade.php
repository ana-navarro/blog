@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1 class="col-12 text-dark">{{ $post->title }}</h1>
    <p class="col-12 text-muted"> Criado {{\Carbon\Carbon::parse($post->created_at)->diffForHumans()}} por {{ $post->user->name }}</p>
    @if ($post->trashed())
        <p class="col-12 text-muted">Deletado em {{\Carbon\Carbon::parse($post->deleted_at)->diffForHumans()}}</p>
    @endif
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

    <h5 class="col-12 text-dark">Comentários</h5>

    @forelse($post->comments as $comment)
    <div class="col-12">
        <div class="card">
            <x-badge title="{{ $comment->content }}" date="{{$comment->created_at}}"></x-badge>
        </div>
    </div>
    @empty
        <p>Nenhum comentário ainda!</p>
    @endforelse
@stop

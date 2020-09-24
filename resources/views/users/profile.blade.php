@extends('adminlte::page')

@section('title', 'Blog')

@section('content_header')
    <h1 class="m-0 text-dark">Perfil</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <p>{{$user->name}}</p>
                    <p>{{$user->email}}</p>
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
    </div>
@stop

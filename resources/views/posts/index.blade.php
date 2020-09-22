@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Últimas Notícas') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <div class="panel-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif 
                        
                        @forelse ($posts as $post)
                        <p>
                            <h3>
                                <a href="{{ route('posts.show', ['post' => $post->id]) }}">{{ $post->title }}</a>
                            </h3>

                            {{ Str::limit( $value=$post->content, $limit=40, $end='...') }}
                            <a href="{{ route('posts.show', ['post'=>$post->id]) }}">Ler Mais</a> 

                            @if (Auth::check())
                    
                                <form method="POST" class="fm-inline"
                                    action="{{ route('posts.destroy', ['post' => $post->id]) }}">
                                    @csrf
                                    @method('DELETE')
                                    <a href="{{ route('posts.edit', ['post' => $post->id]) }}"
                                        class="btn btn-primary">
                                        Editar
                                    </a>
                    
                                    <input type="submit" value="Deletar" class="btn btn-primary"/>
                                </form>
                            @endif
                        </p>
                    @empty
                        <p>Nenhum post publicado ainda</p>
                    @endforelse

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
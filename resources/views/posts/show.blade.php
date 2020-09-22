@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ $post->title }}</div>

                    <div class="card-body">
                        @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                        @endif
                        <p>{{$post->content}}</p>
                        <p>{{$post->created_at}}</p>
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
    </div>
@endsection
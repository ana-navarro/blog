@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1 class="m-0 text-dark">Biblioteca de Posts</h1>
    <a href="{{ route('posts.create') }}"class="btn btn-primary my-2">Adicionar um novo Post</a>
@stop

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div id="post-table">
                    <table>
                        <th width=30% class="border">
                            <h4>Título</h4>
                        </th>
                        <th width=35% class="border">
                            <h4>Conteúdo</h4>
                        </th>
                        <th width=20% class="border">
                            <h4>Criado em</h4>
                        </th>
                        @if (Auth::check()) 
                        <th width=10% class="border">
                            <h4>Ações</h4>
                        </th>
                        @endif
                    
                        @forelse ($posts as $post)
                        <tr>
                            <td class="border">
                                <p>
                                    <a href="{{ route('posts.show', ['post' => $post->id]) }}">{{ $post->title }}</a>
                                </p>
                            </td>
        
                            <td class="border">
                                {{ Str::limit( $value=$post->content, $limit=40, $end='...') }}
                            </td>
        
                            <td class="border">
                                <a href="{{ route('posts.show', ['post' => $post->created_at]) }}">{{ $post->created_at }}</a>
                            </td>
        
                                @if (Auth::check())
                                <td class="border ">       
                                    <form method="POST" class="fm-inline" action="{{ route('posts.destroy', ['post' => $post->id]) }}">
                                        @csrf
                                        @method('DELETE')
                                        <a href="{{ route('posts.edit', ['post' => $post->id]) }}" class="btn btn-success">
                                            <i class="far fa-edit"></i>
                                        </a>
                                        <button type="submit" class="btn btn-danger">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>    
                                    </form>
                                </td>
                                @endif
                            
                        </tr> 
                        @empty
                            <p>Nenhum post publicado ainda</p>
                        @endforelse
                    </table>
                    <div class="text-center">
                        <br>
                        {{ $posts->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
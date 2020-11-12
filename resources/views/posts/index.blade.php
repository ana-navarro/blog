@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
<div class="row">
    <div class="col-12">
        <h1 class="m-0 text-dark">Biblioteca de Posts</h1>
        <a href="{{ route('posts.create') }}"class="btn btn-primary my-2">Adicionar um novo Post</a>
    </div>

</div>
@stop

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div id="post-table">
                    <table>
                        <th width=10% class="border-bottom text-center">
                            Título
                        </th>
                        <th width=20% class="border-bottom text-center">
                            Conteúdo
                        </th>

                        <th width=10% class="border-bottom text-center">
                            Autor
                        </th>
                        <th width=5% class="border-bottom text-center">
                            Data
                        </th>
                        @if (Auth::check())
                        <th width=5% class="border-bottom text-center">
                            Ações
                        </th>
                        @endif

                        @forelse ($posts as $post)
                        <tr>
                            <td class="border">
                                <p>
                                    @if ($post->trashed())
                                        <del><a href="{{ route('posts.show', ['post' => $post->id]) }}" class="text-muted">
                                            {{ $post->title }}</a></del>
                                    @else
                                        <a href="{{ route('posts.show', ['post' => $post->id]) }}">{{ $post->title }}</a>
                                    @endif
                                </p>
                            </td>

                            <td class="border">
                                @if ($post->trashed())
                                        <del class="text-muted">{{ Str::limit( $value=$post->content, $limit=15, $end='...') }}</del>
                                @else
                                    {{ Str::limit( $value=$post->content, $limit=100, $end='...') }}
                                @endif
                            </td>

                            <td class="border">
                                @if ($post->trashed())
                                        <del class="text-muted">{{ $post->user->name }}</del>
                                @else
                                    {{ $post->user->name }}
                                @endif
                            </td>

                            <td class="border">
                                {{ \Carbon\Carbon::parse($post->created_at)->format('d/m/Y') }} <br>
                                {{ \Carbon\Carbon::parse($post->created_at)->diffForHumans() }}
                            </td>
                                <td class="border text-center">
                                    <form method="POST" class="fm-inline" action="{{ route('posts.destroy', ['post' => $post->id]) }}">
                                        @csrf
                                        @method('DELETE')
                                        @can('update', $post)
                                            <a href="{{ route('posts.edit', ['post' => $post->id]) }}" class="btn btn-success btn-sm">
                                                <i class="far fa-edit"></i>
                                            </a>
                                        @endcan
                                        @if(!$post->trashed())
                                            @can('delete', $post)
                                                <button type="submit" class="btn btn-danger btn-sm">
                                                    <i class="fas fa-trash-alt"></i>
                                                </button>
                                            @endcan
                                        @else
                                            @can('restore', $post)
                                                <button type="submit" class="btn btn-primary btn-sm">
                                                    <a href=""><i class="fas fa-trash-restore-alt text-white"></i></a>
                                                </button>
                                            @endcan
                                        @endif

                                        @cannot(['update', 'delete', 'restore'], $post)
                                            <p>Você não tem permissão!</p>
                                        @endcannot
                                    </form>
                                </td>

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

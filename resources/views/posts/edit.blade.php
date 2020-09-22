@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Editando post') }} {{ $post->title }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form method="POST"  action="{{ route('posts.update', ['post' => $post->id]) }}">
                            @csrf
                            @method('PUT')
                            @include('posts._form')

                            <button type="submit" class="btn btn-primary btn-block">Editar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
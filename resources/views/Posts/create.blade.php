@extends('adminlte::page')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Criar um Novo Post') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form method="POST" action="{{ route('posts.store') }}">
                            @csrf
                            @include('posts._form')

                            <button type="submit" class="btn btn-primary btn-block">Criar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
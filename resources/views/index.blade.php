@extends('layouts.app')

@section('content')

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

    <h1> Articles </h1>
    <div class="articles-container">
        @foreach ( $articles as $article )
            <div class="card mb-3">
                <div class="card-body">
                    <h5 class="card-title"><a href="{{ route('article.show', $article->id) }}" class="article-desc">{{ $article->title }}</a></h5>
                    <a href="{{ route('articles.edit', $article->id) }}" class="btn btn-success">Edit</a>
                    <a href="#" class="btn btn-danger">Delete</a>
                </div>
            </div>
        @endforeach
    </div>
    {{ $articles->links('vendor.pagination.bootstrap-5') }}
@endsection

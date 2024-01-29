@extends('layouts.app')

@section('content')

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

    <h1> Articles </h1>
    <div>
        <a href="{{ route('articles.create') }}" class="btn btn-primary">Create an article</a>
    </div><br>
    <div class="articles-container">
        @foreach ( $articles as $article )
            <div class="card mb-3">
                <div class="card-body">
                    <h5 class="card-title"><a href="{{ route('articles.show', $article->id) }}" class="article-desc">{{ $article->title }}</a></h5>
                    <a href="{{ route('articles.edit', $article->id) }}" class="btn btn-success">Edit</a>
                    <form action = {{ route('articles.delete', $article->id) }} method = "POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure to delete this article ?')"> Delete</button>
                    </form>
                    
                </div>
            </div>
        @endforeach   
    </div>
    {{ $articles->links('vendor.pagination.bootstrap-5') }}
@endsection

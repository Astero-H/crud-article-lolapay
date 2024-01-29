@extends('layouts.app')


@section('content')
    <h1> Details </h1>
        <div class="form-group">
            <label for="title">Title:</label>
            <input type="text" class="form-control" id="title-disabled" name="title" value="{{ $article->title }}" disabled >
        </div><br>

        <div class="form-group">
            <label for="content">Content:</label>
            <textarea class="form-control" id="content-disabled" name="content" required disabled>{{ $article->content }} </textarea>
        </div><br>

        <a href="{{ route('articles.index') }}" class="btn btn-primary"> Return to the list</a> 
@endsection
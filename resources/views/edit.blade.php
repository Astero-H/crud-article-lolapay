@extends('layouts.app')

@section('content')
    <h1>Edit article</h1>
    
    @if ($errors->any())
    <div class="alert alert-danger">
        <strong>Oops !</strong> Errors encountered with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('articles.update', $article->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="title">Title:</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ $article->title }}" required>
        </div><br>

        <div class="form-group">
            <label for="content">Content:</label>
            <textarea class="form-control" id="content" name="content" required>{{ $article->content }}</textarea>
        </div><br>

        <button type="submit" class="btn btn-success">Update</button>
        <button type="button" onclick="window.location='{{ URL::route('articles.index') }}'" class="btn btn-primary">Cancel</button>
        <a href="{{ route('articles.create') }}" class="btn btn-primary edit-create">Create an article</a>
    </form>

@endsection
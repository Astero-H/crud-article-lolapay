@extends('layouts.app')

@section('content')
<h1>Create article</h1>

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

    <form action="{{ route('articles.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="title">Title:</label>
            <input type="text" class="form-control" id="title" name="title" required>
        </div><br>

        <div class="form-group">
            <label for="content">Content:</label>
            <textarea class="form-control" id="content" name="content" required></textarea>
        </div><br>

        <button type="submit" class="btn btn-success">Create </button>
        <button type="button" onclick="window.location='{{ URL::route('articles.index') }}'" class="btn btn-primary">Cancel</button>
    </form>

@endsection
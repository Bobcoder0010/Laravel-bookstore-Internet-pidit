@extends('layouts.app')

@section('content')
    <h1>Edit Book</h1>
    <form action="{{ route('books.update', $book->id) }}" method="POST">
        @csrf
        @method('PUT')
        <input type="text" name="title" value="{{ $book->title }}">
        <input type="text" name="author" value="{{ $book->author }}">
        <textarea name="description">{{ $book->description }}</textarea>
        <input type="text" name="price" value="{{ $book->price }}">
        <button type="submit">Update Book</button>
    </form>
@endsection

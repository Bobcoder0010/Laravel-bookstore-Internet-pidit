@extends('layouts.app')

@section('content')
    <h1>Books</h1>
    <a href="{{ route('books.create') }}">Add New Book</a>

    <ul>
        @foreach ($books as $book)
            <li>
                <a href="{{ route('books.show', $book->id) }}">{{ $book->title }}</a>
                <form action="{{ route('books.destroy', $book->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
                <a href="{{ route('books.edit', $book->id) }}">Edit</a>
            </li>
        @endforeach
    </ul>
@endsection

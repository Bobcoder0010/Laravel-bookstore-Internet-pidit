@extends('layouts.app')

@section('content')
    <h1>Add New Book</h1>
    <form action="{{ route('books.store') }}" method="POST">
        @csrf
        <input type="text" name="title" placeholder="Title">
        <input type="text" name="author" placeholder="Author">
        <textarea name="description" placeholder="Description"></textarea>
        <input type="text" name="price" placeholder="Price">
        <button type="submit">Add Book</button>
    </form>
@endsection

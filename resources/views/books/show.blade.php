@extends('layouts.app')

@section('content')
    <h1>{{ $book->title }}</h1>
    <p>{{ $book->author }}</p>
    <p>{{ $book->description }}</p>
    <p>${{ $book->price }}</p>
@endsection

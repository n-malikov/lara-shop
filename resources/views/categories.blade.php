@extends('master')

@section('title', 'Категории - Laravel')

@section('content')
    <h1>Категории</h1>
    <br>
    @foreach($categories as $category)
        <a href="{{ route('category', $category->code) }}" class="button">{{ $category->name }}</a>
        {{ $category->description }}
        <br><br>
    @endforeach
@endsection

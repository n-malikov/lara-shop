@extends('layouts.master')

@section('title', 'Категории - Laravel')

@section('content')
    <h1>Категории</h1>
    <br>
    @foreach($categories as $category)
        <a href="{{ route('category', $category->code) }}"><img src="{{ Storage::url($category->image) }}" height="70px"></a><br>
        <a href="{{ route('category', $category->code) }}" class="button">{{ $category->name }}</a>
        {{ $category->description }}
        <br><br><br>
    @endforeach
@endsection

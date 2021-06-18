@extends('master')

@section('title', $category->name . ' - Laravel')

@section('content')
    <h1>Категория: {{ $category->name }}</h1>
    <br>
    {{ $category->description }}
    <br><br>
    Товаров в категории: {{ $category->products->count() }}
    <br><br>

    @foreach($category->products as $product)
        @include('card', compact('product'))
    @endforeach
@endsection

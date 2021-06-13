@extends('master')

@section('title', $category->name . ' - Laravel')

@section('content')
    <h1>Категория: {{ $category->name }}</h1>
    <br>
    {{ $category->description }}
    <br><br>
    @include('card', ['category' => $category])
@endsection

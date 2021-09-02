@extends('layouts.master')

@section('title', 'Продукт «' . $product->name . '» - Админка')

@section('content')
    <h1>Продукт «{{ $product->name }}» - Панель администратора</h1>
    <br>

    <strong>ID</strong>
    <br>
    {{ $product->id }}
    <br><br>

    <strong>Код</strong>
    <br>
    {{ $product->code }}
    <br><br>

    <strong>Категория</strong>
    <br>
    {{ $product->category->name }}
    <br><br>

    <strong>Название</strong>
    <br>
    {{ $product->name }}
    <br><br>

    <strong>Описание</strong>
    <br>
    {{ $product->description }}
    <br><br>

    <strong>Цена</strong>
    <br>
    {{ $product->price }}
    <br><br>

    <strong>Изображение</strong>
    <br>
    {{-- Storage генерит ссылку по значению APP_URL в .env --}}
    <img src="{{ Storage::url($product->image) }}" height="100px">
    <br><br>



@endsection

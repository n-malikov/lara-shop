@extends('layouts.master')

@section('title', 'Категория «' . $category->name . '» - Админка')

@section('content')
    <h1>Категория «{{ $category->name }}» - Панель администратора</h1>
    <br>

    <strong>ID</strong>
    <br>
    {{ $category->id }}
    <br><br>

    <strong>Код</strong>
    <br>
    {{ $category->code }}
    <br><br>

    <strong>Название</strong>
    <br>
    {{ $category->name }}
    <br><br>

    <strong>Описание</strong>
    <br>
    {{ $category->description }}
    <br><br>

    <strong>Кол-во товаров</strong>
    <br>
    {{ $category->products->count() }}
    <br><br>

    <strong>Изображение</strong>
    <br>
    {{-- Storage генерит ссылку по значению APP_URL в .env --}}
    <img src="{{ Storage::url($category->image) }}" height="100px">
    <br><br>



@endsection

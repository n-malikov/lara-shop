@extends('layouts.master')

@isset($category)
    @section('title', 'Редактировать категорию «' . $category->name . '»  - Админка')
@else
    @section('title', 'Создать категорию - Админка')
@endisset

@section('content')

    @isset($category)
        <h1>Редактировать категорию «{{ $category->name }}» - Панель администратора</h1>
    @else
        <h1>Создать категорию - Панель администратора</h1>
    @endisset

    <br>

    <form action="
            @isset($category)
                {{ route('categories.update', $category) }}
            @else
                {{ route('categories.store') }}
            @endisset
        " method="POST" enctype="multipart/form-data">
        @isset($category)
            <?php
            // Я НЕ ПОНЯЛ ЗАЧЕМ ОН, НУЖНО БУДЕТ ИЗУЧИТЬ
            ?>
            @method('PUT')
        @endisset

        Код
        @error('code') <span class="error">{{ $message }}</span> @enderror
        <input type="text" name="code" {{-- required --}} autofocus value="@isset($category){{ $category->code }}@endisset">

        Название
        @error('name') <span class="error">{{ $message }}</span> @enderror
        <input type="text" name="name" {{-- required --}} value="@isset($category){{ $category->name }}@endisset">

        Описание
        @error('description') <span class="error">{{ $message }}</span> @enderror
        <textarea name="description">@isset($category){{ $category->description }}@endisset</textarea>

        Изображение<br>
        <input type="file" name="image">
        @if(isset($category) && isset($category->image))
            <br><br><img src="{{ Storage::url($category->image) }}" height="100px">
        @endif

        <br><br>

        @csrf
        <button type="submit" class="button">Сохранить</button>

    </form>

@endsection

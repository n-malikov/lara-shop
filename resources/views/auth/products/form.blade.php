@extends('layouts.master')

@isset($product)
    @section('title', 'Редактировать товар «' . $product->name . '»  - Админка')
@else
    @section('title', 'Создать товар - Админка')
@endisset

@section('content')

    @isset($product)
        <h1>Редактировать товар «{{ $product->name }}» - Панель администратора</h1>
    @else
        <h1>Создать товар - Панель администратора</h1>
    @endisset

    <br>

    <form action="
        @isset($product)
            {{ route('products.update', $product) }}
            @else
            {{ route('products.store') }}
        @endisset
    " method="POST" enctype="multipart/form-data">
        @isset($product)
            <?php
            // Я НЕ ПОНЯЛ ЗАЧЕМ ОН, НУЖНО БУДЕТ ИЗУЧИТЬ
            ?>
            @method('PUT')
        @endisset

        Код
        @error('code') <span class="error">{{ $message }}</span> @enderror
        <input type="text" name="code" {{-- required --}} autofocus
               {{-- с помощью "old" подставляем введенное значение пользователем --}}
               value="{{ old('code', isset($product) ? $product->code : null ) }}"
        >

        Название
        @error('name') <span class="error">{{ $message }}</span> @enderror
        <input type="text" name="name" {{-- required --}} value="{{ old('name', isset($product) ? $product->name : null ) }}">

        Категория
        <select name="category_id">
            @foreach($categories AS $category)
                <option
                    value="{{ $category->id }}"
                    @isset($product)
                        @if($product->category_id == $category->id )
                            selected
                        @endif
                    @endisset
                >{{ $category->name }}</option>
            @endforeach
        </select>

        Описание
        @error('description') <span class="error">{{ $message }}</span> @enderror
        <textarea name="description">{{ old('description', isset($product) ? $product->description : null ) }}</textarea>

        Цена
        @error('price') <span class="error">{{ $message }}</span> @enderror
        <input type="text" name="price" {{-- required --}} value="{{ old('price', isset($product) ? $product->price : null ) }}">

        Изображение<br>
        <input type="file" name="image">
        @if(isset($product) && isset($product->image))
            <br><br><img src="{{ Storage::url($product->image) }}" height="100px">
        @endif

        <br><br>

        @csrf
        <button type="submit" class="button">Сохранить</button>

    </form>

@endsection

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
        <input type="text" name="code" required autofocus value="@isset($product){{ $product->code }}@endisset">

        Название
        <input type="text" name="name" required value="@isset($product){{ $product->name }}@endisset">

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
        <textarea name="description">@isset($product){{ $product->description }}@endisset</textarea>

        Цена
        <input type="text" name="price" required value="@isset($product){{ $product->price }}@endisset">

        <br>

        @csrf
        <button type="submit" class="button">Сохранить</button>

    </form>

@endsection

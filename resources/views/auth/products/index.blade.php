@extends('layouts.master')

@section('title', 'Продукты - Админка')

@section('content')
    <h1>Продукты - Панель администратора</h1>
    <br>

    <table class="table">
        <thead>
        <tr>
            <th width="40px">#</th>
            <th>Код</th>
            <th>Название</th>
            <th>Категория</th>
            <th>Цена</th>
            <th>Действия</th>
        </tr>
        </thead>
        <tbody>
        @if(!empty($products))
            @foreach($products AS $product)

                <tr>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->code }}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->category->name }}</td>
                    <td>{{ $product->price }}</td>
                    <td>
                        <?php
                        // тут можно передать просто $product , без id
                        ?>
                        <a href="{{ route('products.show', $product->id) }}" class="button">Открыть</a>
                        <a href="{{ route('products.edit', $product->id) }}" class="button">Редактировать</a>

                        <form action="{{ route('products.destroy', $product) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <input type="submit" class="button" value="Удалить">
                        </form>

                    </td>
                </tr>

            @endforeach
        @endif
        </tbody>
    </table>

    <a href="{{ route('products.create') }}" class="button">Добавить продукт</a>

@endsection

@extends('layouts.master')

@section('title', 'Категории - Админка')

@section('content')
    <h1>Категории - Панель администратора</h1>
    <br>

    <table class="table">
        <thead>
        <tr>
            <th width="40px">#</th>
            <th>Код</th>
            <th>Название</th>
            <th>Действия</th>
        </tr>
        </thead>
        <tbody>
        @if(!empty($categories))
            @foreach($categories AS $category)

                <tr>
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->code }}</td>
                    <td>{{ $category->name }}</td>
                    <td>
                        <?php
                        // тут можно передать просто $category , без id
                        ?>
                        <a href="{{ route('categories.show', $category->id) }}" class="button">Открыть</a>
                        <a href="{{ route('categories.edit', $category->id) }}" class="button">Редактировать</a>

                        <form action="{{ route('categories.destroy', $category) }}" method="POST">
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

    <a href="{{ route('categories.create') }}" class="button">Добавить категорию</a>

@endsection

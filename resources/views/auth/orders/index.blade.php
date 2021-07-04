@extends('layouts.master')

@section('title', 'Заказы - Админка')

@section('content')
    <h1>Заказы - Панель администратора</h1>
    <br>

    @if(!empty($orders))
        @foreach($orders as $order)

            <br>
            <strong>ID:</strong> {{ $order->id }}
            <br>

            <strong>Имя:</strong> {{ $order->name }}
            <br>

            <strong>Телефон:</strong> {{ $order->phone }}
            <br>

            <strong>Дата:</strong> {{ $order->created_at->format('H:i d/m/Y') }}
            <br>

            <strong>Сумма заказа:</strong> {{ $order->getFullPrice() }}
            <br>

            <br>
            <a href="#" class="button">Открыть</a>
            <br>

        @endforeach
    @endif

@endsection

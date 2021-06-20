@extends('layouts.master')

@section('title', 'Оформление заказа - Laravel')

@section('content')
    <h1>Оформление заказа</h1>
    <br>

    Сумма заказа: {{ $order->getFullPrice() }} руб.
    <br><br>

    <form action="{{ route('basket-confirm') }}" method="POST">

        Имя
        <input type="text" name="name">

        Телефон
        <input type="text" name="phone">

        <br>
        @csrf
        <button type="submit" class="button">Подтвердить заказ</button>

    </form>
@endsection

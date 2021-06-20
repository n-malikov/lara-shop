@extends('master')

@section('title', 'Корзина - Laravel')

@section('content')
    <h1>Корзина</h1>

    @foreach($order->products as $product)
        <br><br>
        <strong><a href="{{ route('product', [$product->category->code, $product->code]) }}">{{ $product->name }}</a></strong>
        <br>
        Цена: {{ $product->price }}
        <br>
        Общ: {{ $product->getPriceForCount() }}

        <br><br>
        <div class="count-buttons">
            <form action="{{ route('basket-remove', $product) }}" method="POST">
                <button type="submit" class="button">-</button>
                @csrf
            </form>
            <div class="count-buttons__int">
                {{ $product->pivot->count }}
            </div>
            <form action="{{ route('basket-add', $product) }}" method="POST">
                <button type="submit" class="button">+</button>
                @csrf
            </form>
        </div>

        <br>
        <hr>
    @endforeach

    <br>
    Итого: <strong>{{ $order->getFullPrice() }}</strong>

@endsection

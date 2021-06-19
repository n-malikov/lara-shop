@extends('master')

@section('title', 'Корзина - Laravel')

@section('content')
    <h1>Корзина</h1>

    @foreach($order->products as $product)
        <br><br>
        <strong><a href="{{ route('product', [$product->category->code, $product->code]) }}">{{ $product->name }}</a></strong>
        <br>
        Цена: {{ $product->price }}

        <br><br>
        <form action="{{ route('basket-add', $product) }}" method="POST">
            <button type="submit" class="button">+</button>
            @csrf
        </form>

        <br>
        <hr>
    @endforeach

@endsection

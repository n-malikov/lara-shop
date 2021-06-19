@extends('master')

@section('title', 'Все товары - Laravel')

@section('content')
    <h1>Все товары</h1>
    <br>
    <hr>

    @if(!empty($products))
        @foreach($products as $product)
            @include('card', compact('product'))
        @endforeach
    @endif

@endsection

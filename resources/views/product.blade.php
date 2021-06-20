@extends('layouts.master')

@section('title', $product . ' - Laravel')

@section('content')
    <h1>Продукт</h1>
    <br>
    {{ $product }}
@endsection

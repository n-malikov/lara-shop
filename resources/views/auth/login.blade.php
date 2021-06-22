@extends('layouts.master')

@section('title', 'Авторизация - Laravel')

@section('content')
    <h1>Авторизация</h1>
    <br>

    <form action="{{ route('login') }}" method="POST">

        E-mail
        <input type="email" name="email" required autofocus>

        Пароль
        <input type="password" name="password" required>

        <br>
        @csrf
        <button type="submit" class="button">Войти</button>

    </form>
@endsection

@extends('layouts.master')

@section('title', 'Регистрация - Laravel')

@section('content')
    <h1>Регистрация</h1>
    <br>

    <form action="{{ route('register') }}" method="POST">

        Логин
        <input type="text" name="name" required autofocus>

        E-mail
        <input type="email" name="email" required>

        Пароль
        <input type="password" name="password" required>

        Еще раз
        <input type="password" name="password_confirmation" required>

        <br>
        @csrf
        <button type="submit" class="button">Зарегистрироваться</button>

    </form>
@endsection

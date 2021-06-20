<!DOCTYPE html>
<html lang="ru-RU">
@include('layouts.head')
<body>

<div class="header">
    <div class="container">
        <a href="{{ route('index') }}">Главная</a>
        <a href="{{ route('shop') }}">Магазин</a>
        <a href="{{ route('categories') }}">Категории</a>
        <a href="{{ route('basket') }}">Корзина</a>
    </div>
</div>

<div class="container">
    <div class="content">

        @if(session()->has('success'))
            <div class="message message__success">
                {{ session()->get('success') }}
            </div>
        @endif

        @if(session()->has('warning'))
            <div class="message message__warning">
                {{ session()->get('warning') }}
            </div>
        @endif

        @yield('content')

    </div>
</div>

</body>
</html>

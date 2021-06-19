<!DOCTYPE html>
<html lang="ru-RU">
@include('components.head')
<body>

<div class="header">
    <div class="container">
        <a href="{{ route('index') }}">Главная</a>
        <a href="{{ route('shop') }}">Магазин</a>
        <a href="{{ route('categories') }}">Категории</a>
        <a href="/product/vinni">Продукт</a>
        <a href="/basket">Корзина</a>
    </div>
</div>

<div class="container">
    <div class="content">
        @yield('content')
    </div>
</div>

</body>
</html>

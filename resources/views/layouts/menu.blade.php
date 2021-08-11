<div class="header">
    <a href="{{ route('index') }}">Главная</a>
    <a href="{{ route('shop') }}">Магазин</a>
    <a href="{{ route('categories') }}">Категории</a>
    <a href="{{ route('basket') }}">Корзина</a>

    @guest
        <a href="{{ route('login') }}">Вход</a>
        <a href="{{ route('register') }}">Регистрация</a>
    @endguest

    @auth
        <a href="{{ route('get-logout') }}" class="a_green">Выйти</a>
        <br>
        <a href="{{ route('home') }}" class="a_green">Админка</a>
        <a href="{{ route('categories.index') }}" class="a_green">Категории</a>
    @endauth

</div>

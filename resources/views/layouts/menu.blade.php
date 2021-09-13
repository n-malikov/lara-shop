<div class="header">
    <a href="{{ route('index') }}" @routeactive('index')>Главная</a>
    <a href="{{ route('shop') }}" @routeactive('shop')>Магазин</a>
    <a href="{{ route('categories') }}" @routeactive('categories')>Категории</a>
    <a href="{{ route('basket') }}" @routeactive('basket')>Корзина</a>

    @guest
        <a href="{{ route('login') }}" @routeactive('login')>Вход</a>
        <a href="{{ route('register') }}" @routeactive('register')>Регистрация</a>
    @endguest

    @auth
        <a href="{{ route('get-logout') }}" class="a_green">Выйти</a>
        <br>
        <a href="{{ route('home') }}" class="a_green">Админка</a>
        <a href="{{ route('categories.index') }}" class="a_green">Категории</a>
        <a href="{{ route('products.index') }}" class="a_green">Продукты</a>
    @endauth

</div>

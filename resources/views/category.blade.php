@include('components.header')

@php
    $names = [
        'phones' => 'Мобильные телефоны',
        'portable' => 'Портативная техника',
        'appliances' => 'Бытовая техника',
    ];
@endphp

<div class="container">
    <div class="content">
        <h1>Категория: {{ $names[ $category ] }}</h1>
        <br>
        <a href="/phones" class="button">Мобильные телефоны</a>
        <br><br>
        <a href="/portable" class="button">Портативная техника</a>
        <br><br>
        <a href="/appliances" class="button">Бытовая техника</a>
    </div>
</div>

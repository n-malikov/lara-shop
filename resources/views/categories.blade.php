@include('components.header')

<div class="container">
    <div class="content">
        <h1>Категории</h1>
        <br>
        @foreach($categories as $category)
            <a href="/{{ $category->code }}" class="button">{{ $category->name }}</a>
            {{ $category->description }}
            <br><br>
        @endforeach
    </div>
</div>

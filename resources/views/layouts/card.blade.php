<br>
<a href="{{ route('product', [$product->category->code, $product->code]) }}"><strong>{{ $product->name }}</strong></a>
<br>
описание: {{ $product->description }}
<br>
категория: {{ $product->category->name }}
<br>
цена: {{ $product->price }}

<br>
<img src="{{ Storage::url($product->image) }}" height="100px">


<br><br>
<form action="{{ route('basket-add', $product) }}" method="POST">
    <button type="submit" class="button">Добавить в корзину</button>
    @csrf
</form>
<br>
<hr>

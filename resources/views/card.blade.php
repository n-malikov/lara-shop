<br>
<strong>{{ $product->name }}</strong>
<br>
категория: {{ $product->category->name }}
<br>
цена: {{ $product->price }}
<br>

{{ route('product', [$product->category->code, $product->code]) }}


<br><br>
<hr>

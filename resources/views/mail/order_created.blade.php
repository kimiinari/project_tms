<p>Hello, {{ $name }}!</p>

<p>Your order was accepted!</p>

<p>Price: {{ $fullSum }}$</p>

<table>
    <tbody>
    @foreach($order->skus as $sku)
        <tr>
            <a href="{{ route('sku', [$sku->product->category->code, $sku->product->code, $sku]) }}"></a>
            <a class="btn-group form-inline">{!! $sku->product->__('description') !!}</a>
        </tr>
    @endforeach
    </tbody>
</table>

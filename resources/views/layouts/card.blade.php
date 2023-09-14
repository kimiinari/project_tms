<div class="thumbnail_container col-sm-6 col-md-4">
    <div class="thumbnail">
        <img src="{{ asset('images/' . $sku->product->image) }}" alt="{{ $sku->product->__('name') }}" width="150" height="150">
        <div class="caption">
            <h3>{{ $sku->product->__('name') }}</h3>
            @isset($sku->product->properties)
                @foreach ($sku->propertyOptions as $propertyOption)
                    <h4>{{ $propertyOption->property->__('name') }}: {{ $propertyOption->__('name') }}</h4>
                @endforeach
            @endisset
            <p>{{ $sku->price }}$</p>
            <p>
            <form action="{{ route('basket-add', $sku) }}" method="POST">
                @if($sku->isAvailable())
                    <button type="submit" class="btn btn-primary" role="button">@lang('main.add_to_basket')</button>
                @else
                    @lang('main.not_available')
                @endif
                <a href="{{ route('sku',
                    [isset($category) ? $category->code : $sku->product->category->code, $sku->product->code, $sku->id]) }}"
                   class="btn btn-default"
                   role="button">@lang('main.more')</a>
                @csrf
            </form>
            </p>
        </div>
    </div>
</div>

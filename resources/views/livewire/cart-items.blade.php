<div>
    @foreach($items as $item)
        @livewire('cart-item', ['itemId' => $item->id, 'index' => $loop->index], key('cart-item-' . $item->id))
    @endforeach
</div>
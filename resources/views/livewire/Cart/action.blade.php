<div>
    <button onclick="window.livewire.emit('confirm-action', {emitTo: 'cart.items', action: 'removeItem', itemId: '{{ $item->id }}',text: '¿Estás seguro que querés eliminar el producto de tu compra?'})" type="button" class="btn btn-danger btn-cart-remove px-2 py-1 d-flex justify-content-center align-items-center">
        <i wire:loading.remove wire:target="remove" class="la la-close text-light"></i>
        <span class="text-light d-block d-md-none ml-2">Eliminar producto</span>
    </button>
</div>
<div>
    <div class="row product-table-row px-2 align-items-center pb-0 pt-2 mx-0">

        <div class="d-block d-md-none col-12 p-2"></div>

        <div class="d-flex align-items-center col-8 col-md-5" data-title="Product Info">
            <button onclick="window.livewire.emit('confirm-action', {emitTo: 'cart-items', action: 'removeItem', itemId: '{{ $item->id }}',text: '¿Estás seguro que querés eliminar el producto de tu compra?'})" type="button" class="btn btn-danger px-2 py-1">
                <i wire:loading.remove wire:target="remove" class="la la-close text-light"></i>
            </button>
            <h6 class="text-light ml-3 mb-0">{{ $item->product->name }}</h6>
        </div>
        
        <p class="text-light col-4 col-md-2">${{ $item->product->price }}<span class="d-md-none">/u</span></p>

        <div class="d-block d-md-none col-12 p-2"></div>

        <div class="d-flex justify-content-between mb-2 col-8 col-md-3">
            <div class="d-flex text-center align-items-center">
                <button wire:click="minus" class="btn btn-dark mt-0 px-0" style="display: inline; width: 35px;" key="button-minus">
                    <i wire:loading.remove wire:target="minus" class="la la-minus"></i>
                    <div wire:loading wire:target="minus" class="spinner-border text-primary" style="zoom: .5;" role="status"></div>
                </button>
                <p class="text-light mb-0" style="width: 35px;">{{ $item->quantity }}</p>
                <button wire:click="plus" class="btn btn-dark mt-0 px-0" style="display: inline; width: 35px;" key="button-plus">
                    <i wire:loading.remove wire:target="plus" class="la la-plus"></i>
                    <div wire:loading wire:target="plus" class="spinner-border text-primary" style="zoom: .5;" role="status"></div>
                </button>
            </div>
        </div>

        <div class="col-4 col-md-2">
            <h5 class="font-weight-light mb-0 text-secondary">
                @if($item->product->price_discount)
                <span><del class="text-danger">${{ $item->product->price }}</del></small> - ${{ $item->product->price_discount }}
                    @else
                    ${{ $item->product->price * $item->quantity }}
                    @endif
            </h5>
        </div>
        <div class="d-block d-md-none col-12 p-2"></div>
    </div>
</div>
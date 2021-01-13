<div>
    <div class="d-flex align-items-center justify-content-start">
        <!-- <div style="background-color: #161616;">
            <button wire:click="minus" class="btn btn-dark mt-0 px-0" style="display: inline; width: 50px;" key="button-minus">
                <i wire:loading.remove wire:target="minus" class="la la-minus"></i>
                <div wire:loading wire:target="minus" class="spinner-border text-primary" style="zoom: .5;" role="status"></div>
            </button>
            <p class="text-light px-3" style="border: none; border-radius: 0px; display: inline;">{{-- $quantity --}}</p>
            <button wire:click="plus" class="btn btn-dark mt-0 px-0" style="display: inline; width: 50px;" key="button-plus">
                <i wire:loading.remove wire:target="plus" class="la la-plus"></i>
                <div wire:loading wire:target="plus" class="spinner-border text-primary" style="zoom: .5;" role="status"></div>
            </button>
        </div> -->
        <button type="button" wire:click="addProduct" class="btn btn-md btn-primary d-flex align-items-center" style="padding-top: 6px; padding-bottom: 6px;">
            <div wire:loading wire:target="addProduct" class="spinner-border text-dark" style="zoom: .8;" role="status"></div>
            <i wire:loading.remove wire:target="addProduct" class="la la-cart-plus" style="font-size: 25px;"></i>
            <span class="ml-2">AGREGAR</span>
        </button>
    </div>
</div>
<div>
    <div class="d-flex align-items-center justify-content-between">
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
        <div wire:click="addProduct" class="d-flex justify-content-end align-items-center cursor-pointer">
            <!-- <span class="ml-3"></span> -->
            <div class="mr-1">
                <span wire:loading wire:target="addProduct" class="spinner-border text-primary mr-1" style="zoom: .9;" role="status"></span>
                <span wire:loading.remove wire:target="addProduct"><i class="la la-cart-plus" style="font-size: 30px;"></i></span>
            </div>
            <span>Agregar</span>
        </div>
    </div>
</div>
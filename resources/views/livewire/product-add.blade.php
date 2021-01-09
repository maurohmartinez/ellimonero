<div>
    <div class="d-flex align-items-center justify-content-between">
        <div class="d-flex justify-content-start">
            <button wire:click="minus" class="btn btn-dark mt-0"><i class="la la-minus"></i></button>
            <p class="form-control text-light px-4" style="border: none; border-radius: 0px; background-color: #161616;">{{ $quantity }}</p>
            <button wire:click="plus" class="btn btn-dark mt-0"><i class="la la-plus"></i></button>
        </div>
        <div class="d-flex justify-content-end">
            <span class="ml-3"></span>
            <button class="btn btn-dark mt-0" wire:click="addProduct">Agregar</button>
        </div>
    </div>
</div>
<div wire:poll.10s="loadInfo">
    @if(!$product->ends->isPast())
    <div class="d-flex align-items-center justify-content-between">
        <div style="background-color: #161616;">
            <button wire:click="minus" class="btn btn-dark mt-0 px-0" style="display: inline; width: 40px;" key="button-minus">
                <i wire:loading.remove wire:target="minus" class="la la-minus"></i>
                <div wire:loading wire:target="minus" class="spinner-border text-primary" style="zoom: .5;" role="status"></div>
            </button>
            <p class="text-light px-2" style="border: none; border-radius: 0px; display: inline;">${{ $current_price }}</p>
            <button wire:click="plus" class="btn btn-dark mt-0 px-0" style="display: inline; width: 40px;" key="button-plus">
                <i wire:loading.remove wire:target="plus" class="la la-plus"></i>
                <div wire:loading wire:target="plus" class="spinner-border text-primary" style="zoom: .5;" role="status"></div>
            </button>
        </div>
        <button type="button" wire:click="placeBid" class="btn btn-primary mt-0">
            <span wire:loading wire:target="placeBid" class="spinner-border text-dark" style="zoom: .5;" role="status"></span>
            <span wire:loading.remove wire:target="placeBid">OFERTAR</span>
        </button>
    </div>
    @if($current_winner)
    <div class="bg-dark mt-3 p-3 rounded">
        <strong>Mejor oferta al momento</strong><br>{{ $current_winner }} ${{ $current_winner_price }}
    </div>
    @endif
    @endif
</div>
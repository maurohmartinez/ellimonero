<div>
    <div class="single-shop-card">
        <a href="{{ route('product', ['id' => $product->id]) }}">
            <div style="position: absolute; top: 0px; right: 15px;" class="bg-danger text-light p-2"><i class="la la-clock"></i> <span wire:ignore id="timer-{{ $product->slug }}"></span></div>
            <div>
                @if($product->images)
                @if(count($product->images) > 0)
                <img src="{{ asset($product->images[0]['image_url']) }}" alt="">
                @endif
                @endif
            </div>
        </a>
        <div class="single-shop-card-content section-bg">
            <div class="d-flex justify-content-between">
                <h5 class="mb-0">
                    <a href="{{ route('product', ['id' => $product->id]) }}">
                        {{ $product->name }}
                    </a>
                </h5>
            </div>
            <div class="mt-2">
                {{ Str::words($product->description, 50) }}
            </div>
            @if($product->stock > 0)
            <!-- <div class="mt-4"> -->
                {{-- @livewire('subasta-add', ['product_id' => $product->id], key('subasta-add-' . $product->id)) --}}
            <!-- </div> -->
            @endif
        </div>
    </div>
</div>

@push('scripts')
<script>
    // Set the date we're counting down to
    window['countDownDatetimer_{{ $product->slug }}'] = "{{ $product->ends->isoFormat('x') }}";

    // Update the count down every 1 second
    var x = setInterval(function() {
        window['functionCountDownDatetimer_{{ $product->slug }}']();
    }, 1000);

    window['functionCountDownDatetimer_{{ $product->slug }}'] = function setTime() {
        // Get today's date and time
        var now = new Date().getTime();

        // Find the distance between now and the count down date
        var distance = window['countDownDatetimer_{{ $product->slug }}'] - now;

        // Time calculations for days, hours, minutes and seconds
        var days = Math.floor(distance / (1000 * 60 * 60 * 24));
        var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((distance % (1000 * 60)) / 1000);

        // Display the result in the element with id="demo"
        document.getElementById("timer-{{ $product->slug }}").innerHTML = days + "d " + hours + "h " +
            minutes + "m " + seconds + "s ";

        // If the count down is finished, write some text 
        if (distance < 0) {
            clearInterval(x);
            document.getElementById("timer-{{ $product->slug }}").innerHTML = "FINALIZÓ";
        }
    }
    window['functionCountDownDatetimer_{{ $product->slug }}']();
</script>
@endpush
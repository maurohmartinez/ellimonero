@extends('layouts.app')

@section('content')
<section class="pb-4">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-5">
                <div class="product-information-img">
                    <div style="position: absolute; top: 0px; right: 0px;" class="bg-danger text-light p-2"><i class="la la-clock"></i> <span wire:ignore id="timer-{{ $product->slug }}"></span></div>
                    @if($product->stock == 0 && $product->type == 'regular')
                    <img style="position: absolute; width: 200px;" src="{{ asset('images/sold-out-banner.png') }}" alt="Sold Out">
                    @endif
                    @if(count($product->images) > 1)
                    <div class="owl-carousel">
                        @foreach($product->images as $image)
                        <div><img src="{{ asset($image['image_url']) }}" alt="image"></div>
                        @endforeach
                    </div>
                    @else
                    <div><img src="{{ asset($product->images[0]['image_url']) }}" alt="image"></div>
                    @endif
                </div>
            </div>
            <div class="col-lg-7">
                <div class="pt-4">
                    <h4 class="mb-3">{{ $product['name'] }}</h4>
                    @if($product->stock > 0 && $product->type == 'regular')
                    @if($product->price_discount)
                    <h4><s>${{ $product->price }}</s> {{ $product->price_discount }}</h4>
                    @else
                    <h4>${{ $product->price }}</h4>
                    @endif
                    @endif

                    <div class="content-product pb-4">{!! $product->description !!}</div>

                    @if($product->stock > 0)
                    @if(backpack_auth()->check())

                    @if($product->type == 'regular')
                    @livewire('product-single-add', ['product_id' => $product->id], key('product-single-' . $product->id))
                    @else
                    @livewire('subasta-add', ['product_id' => $product->id], key('subasta-add-' . $product->id))
                    @endif
                    @endif
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('scripts')
@if($product->type == 'auction')
@if($product->starts->isPast())
<script>
    // Set the date we're counting down to
    var countDownDatetimer = "{{ $product->ends->isoFormat('x') }}";

    // Update the count down every 1 second
    var x = setInterval(function() {
        setTime();
    }, 1000);

    function setTime() {
        // Get today's date and time
        var now = new Date().getTime();

        // Find the distance between now and the count down date
        var distance = countDownDatetimer - now;

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
    setTime();
</script>
@else
<script>
    document.getElementById("timer-{{ $product->slug }}").innerHTML = "Comienza el {{ $product->starts->isoFormat('LLL') }}";
</script>
@endif
@endif
@endsection
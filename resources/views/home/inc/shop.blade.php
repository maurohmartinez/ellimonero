<section class="shop-banner-area" id="tienda">
    <div class="banner-area-bg bg-primary">
        <div class="container">
            <div class="row px-4">
                <div class="shop-banner d-flex align-items-center justify-content-between">
                    <div class="shop-banner-content">
                        <h2 class="text-dark">Tienda</h2>
                        <p class="text-dark">Mostrando 1-15 de 15 productos</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="shop-card-area py-70 py-md-50">
    <div class="container">
        <div class="row">
            @foreach($products as $product)
            <div class="col-xl-4 col-md-6 mb-50">
                <div class="single-shop-card">
                    <!-- <a href="{{ route('product', ['slug' => $product->slug]) }}"> -->
                        <div class="single-shop-card-img">
                            @if($product->stock == 0)
                            <img style="position: absolute; width: 200px;" src="{{ asset('images/sold-out-banner.png') }}" alt="Sold Out">
                            @endif
                            @if($product->images[0])
                            <img src="{{ asset($product->images[0]['image_url']) }}" alt="">
                            @endif
                        </div>
                    <!-- </a> -->
                    <div class="single-shop-card-content section-bg">
                        <div class="d-flex justify-content-between">
                            <h5 class="mb-0 text-primary">
                                <!-- <a href="#"> -->
                                {{ $product->name }}
                                <!-- </a> -->
                            </h5>
                            @if($product->stock > 0)
                            <h4 class="mb-0">
                                @if($product->price_discount)
                                <span>${{ $product->price }}</span> ${{ $product->price_discount }}
                                @else
                                ${{ $product->price }}
                                @endif
                            </h4>
                            @endif
                        </div>
                        <div class="mt-2">
                            {{ Str::words($product->description, 50) }}
                        </div>
                        @if($product->stock > 0)
                        <div class="mt-4">
                            @if(backpack_auth()->check())
                            @livewire('product-add', ['product_id' => $product->id], key('product-' . $product->id))
                            @endif
                        </div>
                        @endif
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
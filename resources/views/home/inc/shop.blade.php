<section class="shop-banner-area">
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
                    <div class="single-shop-card-img">
                        <img src="{{ asset($product->images[0]['image_url']) }}" alt="">
                    </div>
                    <div class="single-shop-card-content section-bg">
                        <div class="d-flex justify-content-between">
                            <h5 class="mb-0"><a href="#">{{ $product->name }}</a></h5>
                            <h4 class="mb-0">
                                @if($product->price_discount)
                                <span>${{ $product->price }}</span> ${{ $product->price_discount }}
                                @else
                                ${{ $product->price }}
                                @endif
                            </h4>
                        </div>
                        <div class="mt-2">
                            {{ Str::words($product->description, 50) }}
                        </div>
                        <div class="mt-4">
                            @if(backpack_auth()->check())
                            @livewire('product-add', ['product_id' => $product->id], key('product-' . $product->id))
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@extends('layouts.app')

@section('content')
<section class="product-information-area">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-5">
                <div class="product-information-img">
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
                <div class="product-information-dtls">
                    <h3>{{ $product['name'] }}</h3>
                    <div class="product-reviews">
                        <div class="review__rating">
                            <input type="radio" checked value='0' name='rating' />
                            <label>★</label>
                            <input type="radio" value='1' name='rating' />
                            <label>★</label>
                            <input type="radio" value='2' name='rating' />
                            <label>★</label>
                            <input type="radio" value='3' name='rating' />
                            <label>★</label>
                            <input type="radio" value='4' name='rating' />
                            <label>★</label>
                        </div>
                    </div>

                    @if($product->price_discount)
                    <h4><s>${{ $product->price }}</s> {{ $product->price_discount }}</h4>
                    @else
                    <h4>${{ $product->price }}</h4>
                    @endif

                    <p>{{ $product->description }}</p>
                    <div class="product-option-wrapper">
                    </div>
                    @livewire('product-single-add', ['product_id' => $product->id], key('product-single-' . $product->id))
                </div>
            </div>
        </div>
    </div>
</section>
<div class="product-information-tabs-area pb-md-50">
    <div class="container">
        <div class="tab-content product-nav-tab" id="pills-tabContent">
            <div class="tab-pane fade show active product-nav-tab-content" id="description">
                <div class="content-product">{!! $product->content !!}</div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')

@endsection
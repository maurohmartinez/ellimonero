@extends('layouts.app')

@section('content')
<!-- <section class="shop-banner-area pt-4">
    <div class="banner-area-bg bg-primary">
        <div class="container">
            <div class="row px-4">
                <div class="shop-banner d-flex align-items-center justify-content-between">
                    <div class="shop-banner-content">
                        <h2 class="text-dark">Subasta</h2>
                        <p class="text-dark">de productos</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> -->
<div class="shop-card-area py-70 py-md-50">
    <div class="container">
        <div class="row">
        {{dd($products)}}
            @if(count($products) > 0)
            <div class="shop-card-area py-70 py-md-50">
                <div class="container">
                    <div class="row">
                        @foreach($products as $product)
                        <div class="col-lg-6 col-md-6 col-12 mb-50">
                            @livewire('subasta-loop', ['product_id' => $product->id], key('subasta-loop-' . $product->id))
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection
@extends('layouts.app')

@section('content')
<div class="shop-card-area pb-70 pb-md-50">
    <div class="container">
        <div class="row">
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
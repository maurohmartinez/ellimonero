@extends('layouts.app')

@section('content')
<div class="card-banner-area checkout-bg dark-overlay" style="background-image:url({{ asset('/images/checkout-bg.jpg') }});">
    <div class="container">
        <div class="row">
            <div class="card-banner-content left-line">
                <h1>Checkout</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home </a></li>
                        <li class="breadcrumb-item active" aria-current="page">Checkout</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<main class="main-content-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 m-auto">
                @include('flash')
                <div class="product-table">
                    <div class="px-4 py-2 checkout-dtls mb-0 border-0 d-none d-md-block">
                        <div class="row">
                            <div class="col-5">
                                <h6 class="text-light font-weight-bold">Producto</h6>
                            </div>
                            <div class="col-2">
                                <h6 class="text-light">Precio/u</h6>
                            </div>
                            <div class="col-3">
                                <h6 class="text-light">Cantidad</h6>
                            </div>
                            <div class="col-2">
                                <h6 class="text-secondary">Subtotal</h6>
                            </div>
                        </div>
                    </div>
                    @foreach($order->products as $item)
                    <div class="px-4 py-2 mb-0 product-table-row">
                        <div class="row">
                            <div class="col-5">
                                <p class="text-light font-weight-bold">{{ $item['name'] }}</p>
                            </div>
                            <div class="col-2">
                                <p class="text-light">${{ $item['price'] }}/u</p>
                            </div>
                            <div class="col-3">
                                <p class="text-light">x{{ $item['quantity'] }}</p>
                            </div>
                            <div class="col-2">
                                <p class="text-secondary">${{ $item['price'] * $item['quantity'] }}</p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    <div class="checkout-dtls mb-0 p-2 flex-column">
                        <div class="d-flex justify-content-between align-items-center pt-3">
                            <div class="checkout-total-cost checkout-comon-width text-right d-flex align-items-center pl-3">
                                <h4 class="p-0">Total</h4>
                                <h3 class="ml-2 p-0">${{ $order->total }}</h3>
                            </div>
                            <div class="mr-3">
                                <a href="{{ $preference->init_point }}" class="btn btn-info">
                                    <h6 class="font-weight-light"><i class="la la-credit-card"></i> Pagar</h6>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-md-flex justify-content-between align-items-center p-3 mt-3 text-md-left text-center">
                    <img src="{{ asset('images/mercadopago.png') }}" alt="" style="height: auto; width: 150px;">
                    <p class="text-light p-3" style="font-size: 15px; line-height: 18px;">Al hacer click en "Pagar" una venatana se abrirá automáticamente para completar el proceso de pago. Todos nuestros pagos son procesados de manera rápida y segura por Mercadopago.</p>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
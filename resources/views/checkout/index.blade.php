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
            <div class="col-lg-8 mx-auto">
                @include('flash')
                @if($has_items)
                <div>
                    <div class="account-table-wrapper bg-custom-table">
                        <livewire:cart.items />
                    </div>
                    <div class="checkout-dtls mb-0 p-3 mx-sm-4 mx-md-0">
                        <div class="checkout-shipping checkout-comon-width">
                            <h5>Entrega</h5>
                            <p class="text-secondary">* Coordinar con producción</p>
                        </div>
                        <div class="checkout-amount checkout-comon-width">
                            <h5>Subtotal</h5>
                            <h5>
                                <livewire:cart.total />
                            </h5>
                        </div>
                        <div class="checkout-comon-width text-right">
                            <h5>Total</h5>
                            <h3 class="text-primary">
                                <livewire:cart.total />
                            </h3>
                        </div>
                    </div>
                </div>
                <div class="pt-4 text-center">
                    <form action="{{ route('checkout.payment.init') }}" method="POST">
                        @csrf
                        <textarea class="form-control custom-input p-3" placeholder="Indicá en este campo alguna observación o cualquier dato importante que debamos tener en cuenta...." name="observations" id="observations" cols="30" rows="4"></textarea>
                        <p class="text-light my-4">Al confirmar tu orden serás redireccionado al checkout de Mercadopago que procesará de manera rápida y segura tu pago.</p>
                        <button type="submit" class="btn btn-primary btn-lg py-3">CONFIRMAR COMPRA</button>
                    </form>
                </div>
                @else
                <div class="alert alert-danger">No tenés ningún producto en tu compra.</div>
                <a class="btn btn-primary" href="{{ route('home') }}">Continuar navegando</a>
                @endif
            </div>
        </div>
    </div>
</main>
@endsection
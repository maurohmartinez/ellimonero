@extends('layouts.plain')

@section('content')

<div class="container h-100">
    <div class="row align-items-center h-100">
        <div class="col-12 col-md-8 col-lg-4 my-auto mx-auto">
            <div class="text-center pb-4">
                <a href="{{ route('home') }}">
                    <img src="{{ asset('images/logos/logo-800-w.png') }}" alt="" style="max-height: 150px; width: auto;">
                </a>
            </div>
            @if($qr->image)
            <img src="{{ asset($qr->image) }}" alt="" class="mr-3" style="width: 100%; height: auto;">
            @endif
            <div class="alert alert-success d-flex align-items-center mb-4">
                <img src="{{ asset('images/qr.png') }}" alt="" class="mr-3" style="max-height: 50px; width: auto;">
                <p class="font-weight-light pb-0 text-light">{!! $qr->welcome_message !!}</p>
            </div>
            <h5 class="text-center">El último paso es <a href="{{ route('backpack.auth.login') }}">ingresar a tu cuenta</a> en <i>El Limonero digital</i> o si todavía no sos parte de nuestra comunidad <a href="{{ route('backpack.auth.register') }}">registrarte</a>.</h5>
        </div>
    </div>
</div>

@endsection

@section('styles')
<style>
    p {
        color: #fff !important;
        font-weight: 300;
        font-size: 16px;
    }
</style>
@endsection
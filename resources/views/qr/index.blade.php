@extends('layouts.plain')

@section('content')

<div class="container pt-4">
    <div class="row align-items-center h-100">
        <div class="col-12 col-md-8 col-lg-4 my-auto mx-auto p-sm-0">
            <div class="text-center pb-4">
                <a href="{{ route('home') }}">
                    <img src="{{ asset('images/logos/logo-800-w.png') }}" alt="" style="max-height: 120px; width: auto;">
                </a>
            </div>
            @if($qr->image)
            <img src="{{ asset($qr->image) }}" alt="" style="width: 100%; height: auto;">
            @endif
            <div class="px-4 mt-4">
                @if($qr->welcome)
                <div class="alert bg-primary d-flex align-items-center mb-4">
                    <img src="{{ asset('images/qr.png') }}" alt="" class="mr-3" style="max-height: 50px; width: auto;">
                    <p class="font-weight-light pb-0 text-dark">{{ $qr->welcome }}</p>
                </div>
                @endif
                <h5 class="text-center mt-3">El último paso es <a href="{{ route('backpack.auth.login') }}">ingresar a tu cuenta</a> en <i>El Limonero digital</i> o si todavía no sos parte de nuestra comunidad <a href="{{ route('backpack.auth.register') }}">registrarte</a>.</h5>
            </div>
        </div>
    </div>
</div>

@endsection
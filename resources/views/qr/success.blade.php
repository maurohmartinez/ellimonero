@extends('layouts.plain')

@section('content')
<div class="container h-100">
    <div class="row align-items-center h-100">
        <div class="col-12 col-md-8 col-lg-4 mx-auto">
            <div class="text-center pb-4">
                <a href="{{ route('home') }}">
                    <img src="{{ asset('images/logos/logo-800-w.png') }}" alt="" style="max-height: 150px; width: auto;">
                </a>
            </div>
            <div class="d-flex align-items-center mb-4">
                <img src="{{ asset('images/qr.png') }}" alt="" class="mr-3" style="max-height: 50px; width: auto;">
                <p class="font-weight-light pb-0 text-light">{!! $feedback !!}</p>
            </div>
            <p class="text-center font-weight-light text-light pt-2">Te invitamos a <a href="{{ route('home') }}">continuar navegar nuestro sitio</a> y conocer todos nuestros productos.</p>
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
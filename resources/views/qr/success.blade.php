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
            <div class="p-3 text-center">
                @if($qr->success)
                <p class="font-weight-light pb-0 text-light">{!! $qr->success !!}</p>
                @endif
                <div class="mt-4">
                    <a class="btn btn-primary btn-block" href="{{ route('home') }}">Tienda Limonera</a>
                    <a class="btn btn-outline-primary btn-block" href="{{ route('profile.tickets') }}">Boletería</a>
                </div>
            </div>
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
    h5 {
        color: #F7BE00 !important;
    }
</style>
@endsection
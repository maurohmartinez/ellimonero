@extends('layouts.plain')

@section('content')
<div class="container pt-4">
    <div class="row align-items-center h-100">
        <div class="col-12 col-md-8 col-lg-4 my-auto mx-auto p-sm-0">
            <div class="text-center pb-4">
                <a href="{{ route('home') }}">
                    <img src="{{ asset('images/logos/logo-800-w.png') }}" alt="" style="max-height: 150px; width: auto;">
                </a>
            </div>
            <div class="px-4 mt-4">
                <div class="alert alert-danger d-flex align-items-center mb-4">
                    <img src="{{ asset('images/qr.png') }}" alt="" class="mr-3" style="max-height: 50px; width: auto;">
                    <p class="font-weight-light pb-0 text-light">{{ $feedback }}</p>
                </div>
                <h5 class="text-center mt-3">Te invitamos a <a href="{{ route('home') }}">continuar navegar nuestro sitio</a> y conocer todos nuestros productos.</h5>
            </div>
        </div>
    </div>
</div>
@endsection
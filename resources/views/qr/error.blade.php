@extends('layouts.plain')

@section('content')
<div class="container h-100">
    <div class="row align-items-center h-100">
        <div class="col-12 col-md-8 col-lg-4 my-auto mx-auto">
            <div class="text-center pb-4">
                <img src="{{ asset('images/logos/logo-800-w.png') }}" alt="" style="max-height: 150px; width: auto;">
            </div>
            <div class="alert alert-danger d-flex align-items-center mb-4">
                <img src="{{ asset('images/qr.png') }}" alt="" class="mr-3" style="max-height: 50px; width: auto;">
                @if(request()->error == 'already_used')
                Ya has utilizado este código QR.
                @elseif(request()->error == 'doesnt_exist')
                El código QR escaneado no existe o ya venció.
                @elseif(request()->error == 'failed')
                Ocurrió un error y no pudimos completar la operación. Por favor, intentá nuevamente o contactate con nosotros si el error persiste.
                @endif
            </div>
            @include('flash')
            <p class="text-center font-weight-light text-light pt-2">Te invitamos a <a href="{{ route('home') }}">continuar navegar nuestro sitio</a> y conocer todos nuestros productos.</p>
        </div>
    </div>
</div>
@endsection
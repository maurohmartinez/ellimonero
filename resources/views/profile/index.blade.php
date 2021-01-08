@extends('layouts.app')

@section('content')
<div class="card-banner-area checkout-bg dark-overlay mt-4" style="background-image:url({{ asset('/images/checkout-bg.jpg') }});">
    <div class="container">
        <div class="row">
            <div class="card-banner-content left-line">
                <h1>Mi cuenta</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home </a></li>
                        <li class="breadcrumb-item"><a href="#">Mi cuenta </a></li>
                        <li class="breadcrumb-item active" aria-current="page">Editar datos</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
@if(Route::current()->getName() == 'profile')
@include('profile.inc.edit')
@else
@include('profile.inc.orders')
@endif
@endsection
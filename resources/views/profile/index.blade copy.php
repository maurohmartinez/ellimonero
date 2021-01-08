@extends('layouts.app')

@section('content')
<div class="section is-dark">
    <div class="container margin-top is-wide">
        <div class="col lg-12 no-margin-bottom">
            <div class="text-xsmall text-align-center"><a href="#" class="on-dark">Home</a> / <span class="low-text-contrast">Perfil</span></div>
        </div>
    </div>
</div>
<div class="section">
    <div class="container">
        <div class="col-12 col-lg-10 col-md-12 mx-auto text-center">@include('flash')</div>
    </div>
    <div class="container">
        <div class="col-lg-6 col-md-7 col-12 mb-5 offset-lg-1">
            <div class="d-flex align-content-center justify-content-between">
                <h2 class="mb-0">Perfil</h2>
                <a class="btn btn-sm btn-danger" href="{{ route('backpack.auth.logout') }}">Cerrar sesión</a>
            </div>
            <p class="my-2">Actualizá tus datos de contacto.</p>

            <form role="form" method="POST" class="mt-4" action="{{ route('profile.update') }}">
                {!! csrf_field() !!}

                <label class="control-label" for="email">Nombre</label>
                <div>
                    <input type="text" class="form-input-text mb-2 w-input {{ $errors->has('name') ? 'border border-danger' : '' }}" name="name" value="{{ old('name', backpack_user()->name) }}" id="name">
                    @if ($errors->has('name'))
                    <span class="text-danger error-field">
                        <strong>*{{ $errors->first('name') }}</strong>
                    </span>
                    @endif
                </div>
                <label class="control-label mt-3" for="email">Correo electrónico</label>
                <div>
                    <input type="text" class="form-input-text mb-2 w-input {{ $errors->has('email') ? 'border border-danger' : '' }}" name="email" value="{{ old('email', backpack_user()->email) }}" id="email">
                    @if ($errors->has('email'))
                    <span class="text-danger error-field">
                        <strong>*{{ $errors->first('email') }}</strong>
                    </span>
                    @endif
                </div>
                <label class="control-label mt-3" for="email_confirmation">Confirmar correo electrónico</label>
                <div>
                    <input type="text" class="form-input-text mb-2 w-input {{ $errors->has('email_confirmation') ? 'border border-danger' : '' }}" name="email_confirmation" value="{{ old('email_confirmation', backpack_user()->email) }}" id="email_confirmation">
                    @if ($errors->has('email_confirmation'))
                    <span class="text-danger error-field">
                        <strong>*{{ $errors->first('email_confirmation') }}</strong>
                    </span>
                    @endif
                </div>

                <div class="d-md-flex">
                    <button data-wait="Please wait..." class="btn btn-primary" type="submit">Actualizar</button>
                </div>
            </form>
        </div>
        <div class="col-lg-4 col-md-5 col-12 mb-5 px-4">
            <h3>Cambiar contraseña</h3>
            <p class="mb-3">Si crees que tu contraseña es insegura, acá podés actualizarla.</p>
            <form role="form" method="POST" class="" action="{{ route('profile.password.update') }}">
                {!! csrf_field() !!}
                <label class="control-label" for="password">Nueva contraseña</label>
                <div>
                    <input type="password" class="form-input-text mb-2 w-input {{ $errors->has('password') ? 'border border-danger' : '' }}" name="password" id="password">

                    @if ($errors->has('password'))
                    <span class="text-danger error-field">
                        <strong>* {{ $errors->first('password') }}</strong>
                    </span>
                    @endif
                </div>
                <label class="control-label mt-4" for="password_confirmation">Confirmar nueva contraseña</label>
                <div>
                    <input type="password" class="form-input-text mb-2 w-input {{ $errors->has('password_confirmation') ? 'border border-danger' : '' }}" name="password_confirmation" id="password_confirmation">

                    @if ($errors->has('password_confirmation'))
                    <span class="text-danger error-field">
                        <strong>* {{ $errors->first('password_confirmation') }}</strong>
                    </span>
                    @endif
                </div>
                <div class="d-md-flex">
                    <button data-wait="Please wait..." class="btn btn-outline-primary" type="submit">Cambiar contraseña</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
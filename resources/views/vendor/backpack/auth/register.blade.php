@extends('layout.app')

@section('content')
<div class="section is-dark">
    <div class="container margin-top is-wide">
        <div class="col lg-12 no-margin-bottom">
            <div class="text-xsmall text-align-center"><a href="#" class="on-dark">Home</a> / <span class="low-text-contrast">Ingresar</span></div>
        </div>
    </div>
</div>
<div class="section">
    <div class="container">
        <div class="col-12 col-lg-10 col-md-12 mx-auto text-center">@include('flash')</div>
    </div>
    <div class="container">
        <div class="col-lg-6 col-md-7 col-12 mb-5 offset-lg-1">
            <h2>¿No tenés una cuenta?</h2>
            <p>Registrate completando sólo tu nombre y tu email.</p>
            <form role="form" method="POST" action="{{ route('backpack.auth.register') }}">
                {!! csrf_field() !!}

                <label class="control-label" for="name">Nombre</label>
                <div>
                    <input type="text" class="form-input-text w-input mb-2 {{ $errors->has('name') ? 'border border-danger' : '' }}" name="name" value="{{ old('name') }}" id="name">
                    @if ($errors->has('name'))
                    <span class="text-danger error-field">
                        <strong>* {{ $errors->first('name') }}</strong>
                    </span>
                    @endif
                </div>

                <label class="control-label mt-4" for="name">Correo electrónico</label>
                <div>
                    <input type="text" class="form-input-text w-input mb-2 {{ $errors->has('email') ? 'border border-danger' : '' }}" name="email" value="{{ old('email') }}" id="email">
                    @if ($errors->has('email'))
                    <span class="text-danger error-field">
                        <strong>* {{ $errors->first('email') }}</strong>
                    </span>
                    @endif
                </div>

                <label class="control-label mt-4" for="password">{{ trans('backpack::base.password') }}</label>
                <div>
                    <input type="password" class="form-input-text w-input mb-2 {{ $errors->has('password') ? 'border border-danger' : '' }}" name="password" id="password">

                    @if ($errors->has('password'))
                    <span class="text-danger error-field">
                        <strong>* {{ $errors->first('password') }}</strong>
                    </span>
                    @endif
                </div>
                <label class="control-label mt-4" for="password">Confirmar contraseña</label>
                <div>
                    <input type="password" class="form-input-text w-input mb-2 {{ $errors->has('password_confirmation') ? 'border border-danger' : '' }}" name="password_confirmation" id="password_confirmation">

                    @if ($errors->has('password_confirmation'))
                    <span class="text-danger error-field">
                        <strong>* {{ $errors->first('password_confirmation') }}</strong>
                    </span>
                    @endif
                </div>

                <label class="w-checkbox form-checkbox mt-3">
                    <input type="checkbox" name="remember" id="checkbox" name="checkbox" data-name="Checkbox" class="w-checkbox-input">
                    <span class="w-form-label">Recordarme</span>
                </label>

                <div class="d-md-flex">
                    <button data-wait="Please wait..." class="btn btn-primary btn-block mb-1 mb-md-0" type="submit">Registrarme</button>
                    <span class="d-none d-md-block">&nbsp;</span>
                    <a href="{{ route('backpack.auth.login') }}" class="btn btn-outline-primary btn-block mb-1 mb-md-0">Ingresar</a>
                </div>
            </form>
        </div>
        <div class="col-lg-4 col-md-5 col-12 mb-5 px-4">
            <h3>¡O con tu red social!</h3>
            <p>Iniciá sesión con tu red social o cuenta de google.</p>
            <a href="{{ route('register.provider', ['provider' => 'facebook']) }}" class="btn btn-facebook btn-block d-flex justify-content-start"><i class="la la-facebook mr-2"></i> Con Facebook</a>
            <a href="{{ route('register.provider', ['provider' => 'google']) }}" class="btn btn-google btn-block d-flex justify-content-start mt-1"><i class="la la-google mr-2"></i> Con Google</a>
        </div>
    </div>
</div>
@endsection
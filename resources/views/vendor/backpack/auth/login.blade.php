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
        <div class="col-lg-8 col-md-7 col-12">
            <h2 class="margin-bottom">Ingresá</h2>
            <form role="form" method="POST" action="{{ route('backpack.auth.login') }}">
                {!! csrf_field() !!}

                <label class="control-label" for="{{ $username }}">{{ config('backpack.base.authentication_column_name') }}</label>

                <div>
                    <input type="text" class="form-input-text w-input{{ $errors->has($username) ? ' is-invalid' : '' }}" name="{{ $username }}" value="{{ old($username) }}" id="{{ $username }}">
                    @if ($errors->has($username))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first($username) }}</strong>
                    </span>
                    @endif
                </div>

                <label class="control-label" for="password">{{ trans('backpack::base.password') }}</label>
                <div>
                    <input type="password" class="form-input-text w-input{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" id="password">

                    @if ($errors->has('password'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                    @endif
                </div>

                <label class="w-checkbox form-checkbox">
                    <input type="checkbox" name="remember" id="checkbox" name="checkbox" data-name="Checkbox" class="w-checkbox-input">
                    <span class="w-form-label">Recordarme</span>
                </label>

                <div class="d-md-flex">
                    <button data-wait="Please wait..." class="btn btn-primary btn-block mb-1 mb-md-0" type="submit">Ingresar</button>
                    <span class="d-none d-md-block">&nbsp;</span>
                    <a href="#" class="btn btn-outline-primary btn-block mb-1 mb-md-0">Registrarme</a>
                </div>

                <a href="#" class="text-xsmall">¿Olvidaste tu contraseña?</a>
            </form>
        </div>
        <div class="col-lg-3 col-md-5 col-12 my-5 my-md-0">
            <h2 class="margin-bottom">Con tu red social</h2>
            <a href="#" class="btn btn-facebook btn-block d-flex justify-content-start"><i class="la la-facebook mr-2"></i> Con Facebook</a>
            <a href="#" class="btn btn-google btn-block d-flex justify-content-start mt-1"><i class="la la-google mr-2"></i> Con Google</a>
        </div>
    </div>
</div>
@endsection
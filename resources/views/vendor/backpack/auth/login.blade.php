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

                <input type="submit" value="Ingresar" data-wait="Please wait..." class="button-primary lg-md-margin-right sm-w100 w-button">

                <a href="#" class="button-primary bg-primary lg-md-margin-right sm-w100 w-button">Registrarme</a>

                <a href="#" class="text-xsmall">¿Olvidaste tu contraseña?</a>
            </form>
        </div>
        <div class="col-lg-3 col-md-5 col-12">
            <h2 class="margin-bottom">Con tu red social</h2>
            <a href="#" class="button-primary w100 w-button margin-bottom-small"><i class="la la-facebook"></i> Con Facebook</a>
            <a href="#" class="button-primary w100 w-button"><i class="la la-google"></i> Con Google</a>
        </div>
    </div>
</div>
@endsection
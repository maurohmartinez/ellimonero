@extends('layouts.plain')

@section('content')
<div class="container h-100">
    <div class="row align-items-center h-100">
        <div class="col-12 col-md-8 col-lg-4 my-auto mx-auto">
            <div class="text-center pb-4">
                <a href="{{ route('home') }}">
                    <img src="{{ asset('images/logos/logo-800-w.png') }}" alt="" style="max-height: 100px; width: auto;">
                </a>
            </div>
            <h5 class="auth-ingresar mb-2 text-center">INGRESAR</h5>
            <div class="text-center">@include('flash')</div>
            <div class="card card-login">
                <div class="card-body">
                    <div class="col-12">
                        <div class="row">
                            <div class="col-6">
                                <a href="{{ route('login.provider', ['provider' => 'facebook']) }}" class="btn btn-outline-light btn-block"><i class="la la-facebook"></i> Facebook</a>
                            </div>
                            <div class="col-6">
                                <a href="{{ route('login.provider', ['provider' => 'google']) }}" class="btn btn-outline-light btn-block"><i class="la la-google"></i> Google</a>
                            </div>
                            <div class="col-12">
                                <div class="auth-redes"></div>
                            </div>
                        </div>
                    </div>
                    <form class="col-md-12 p-t-10" role="form" method="POST" action="{{ route('backpack.auth.login') }}">
                        {!! csrf_field() !!}

                        <div class="form-group mb-1">
                            <div>
                                <input type="text" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" id="email" placeholder="Nombre">

                                @if ($errors->has('email'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group mb-2">
                            <div>
                                <input type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" id="password" placeholder="Contraseña">

                                @if ($errors->has('password'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="review-checkbox">
                            <label class="label-check check_out">
                                <input type="checkbox" name="remember" class="check-input">
                                <span class="checked"></span>
                                <span class="checked-content">Recordarme</span>
                            </label>
                        </div>

                        <div class="form-group mt-4">
                            <div>
                                <button type="submit" class="btn btn-block btn-primary">
                                    {{ trans('backpack::base.login') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            @if (backpack_users_have_email() && config('backpack.base.setup_password_recovery_routes', true))
            <div class="text-center mt-2"><a href="{{ route('backpack.auth.password.reset') }}">{{ trans('backpack::base.forgot_your_password') }}</a></div>
            @endif
            @if (config('backpack.base.registration_open'))
            <div class="text-center mt-1"><a class="btn btn-outline-light" href="{{ route('backpack.auth.register') }}">Registrarme</a></div>
            @endif
        </div>
    </div>
</div>
@endsection
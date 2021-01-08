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
            <h5 class="auth-ingresar mb-2 text-center">REGISTRARME</h5>
            <div class="card card-login">
                <div class="card-body">
                    <div class="col-12">
                        <div class="row">
                            <div class="col-6">
                                <a href="{{ route('register.provider', ['provider' => 'facebook']) }}" class="btn btn-outline-light btn-block"><i class="la la-facebook"></i> Facebook</a>
                            </div>
                            <div class="col-6">
                                <a href="{{ route('register.provider', ['provider' => 'google']) }}" class="btn btn-outline-light btn-block"><i class="la la-google"></i> Google</a>
                            </div>
                            <div class="col-12">
                                <div class="auth-redes"></div>
                            </div>
                        </div>
                    </div>
                    <form class="col-md-12 p-t-10" role="form" method="POST" action="{{ route('backpack.auth.register') }}">
                        {!! csrf_field() !!}

                        <div class="form-group mb-1">
                            <div>
                                <input type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" id="name" placeholder="Nombre">

                                @if ($errors->has('name'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group mb-1">
                            <div>
                                <input type="text" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" id="email" placeholder="Email">

                                @if ($errors->has('email'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div>
                                <input type="text" class="form-control{{ $errors->has('email_confirmation') ? ' is-invalid' : '' }}" name="email_confirmation" value="{{ old('email_confirmation') }}" id="email_confirmation" placeholder="Confirmar email">

                                @if ($errors->has('email_confirmation'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('email_confirmation') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group mb-1">
                            <div>
                                <input type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" id="password" placeholder="Contraseña">

                                @if ($errors->has('password'))
                                <span class="invalid-feedback">
                                    <strong>Contraseña</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group mb-4">
                            <div>
                                <input type="password" class="form-control{{ $errors->has('password_confirmation') ? ' is-invalid' : '' }}" name="password_confirmation" id="password_confirmation" placeholder="Contraseña">

                                @if ($errors->has('password_confirmation'))
                                <span class="invalid-feedback">
                                    <strong>Confirmar contraseña</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div>
                                <button type="submit" class="btn btn-block btn-primary">
                                    Registrarme
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            @if (backpack_users_have_email() && config('backpack.base.setup_password_recovery_routes', true))
            <p class="text-center mt-2 text-primary mb-0 ya-posee-cuenta">¿Ya tenés una cuenta?</p>
            @endif
            @if (config('backpack.base.registration_open'))
            <div class="text-center"><a class="btn btn-outline-light" href="{{ route('backpack.auth.login') }}">Ingresar</a></div>
            @endif
        </div>
    </div>
</div>
@endsection
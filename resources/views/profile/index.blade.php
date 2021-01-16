@extends('layouts.app')

@section('content')
<div class="account-content-wrapper">
    <div class="container">
        <div class="row">
            @include('profile.inc.nav', ['tab' => 'index'])
            <div class="col-xl-9">
                @include('flash')
                <div class="account-table-wrapper">
                    <div class="row">

                        <div class="col-lg-7 card-login p-4">
                            <h3>Datos</h3>
                            <p class="my-2">Actualizá tus datos de contacto.</p>

                            <form role="form" method="POST" class="mt-4" action="{{ route('profile.update') }}">
                                {!! csrf_field() !!}

                                <label class="control-label label-input" for="email">Nombre</label>
                                <div>
                                    <input type="text" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" name="name" value="{{ old('name', backpack_user()->name) }}" id="name">
                                    @if ($errors->has('name'))
                                    <span class="invalid-feedback">
                                        {{ $errors->first('name') }}
                                    </span>
                                    @endif
                                </div>
                                <label class="control-label mt-3 label-input" for="email">Correo electrónico</label>
                                <div>
                                    <input type="text" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" name="email" value="{{ old('email', backpack_user()->email) }}" id="email">
                                    @if ($errors->has('email'))
                                    <span class="invalid-feedback">
                                        {{ $errors->first('email') }}
                                    </span>
                                    @endif
                                </div>
                                <label class="control-label mt-3 label-input" for="email_confirmation">Confirmar correo electrónico</label>
                                <div>
                                    <input type="text" class="form-control {{ $errors->has('email_confirmation') ? 'is-invalid' : '' }}" name="email_confirmation" value="{{ old('email_confirmation', backpack_user()->email) }}" id="email_confirmation">
                                    @if ($errors->has('email_confirmation'))
                                    <span class="invalid-feedback">
                                        {{ $errors->first('email_confirmation') }}
                                    </span>
                                    @endif
                                </div>

                                <button class="btn btn-block btn-primary mt-3" type="submit">Actualizar</button>
                            </form>
                        </div>

                        <div class="col-1 my-4"></div>

                        <div class="col-lg-4 card-login p-4">
                            <h3>Contraseña</h3>
                            <p class="mb-3">Si crees que tu contraseña es insegura, acá podés actualizarla.</p>
                            <form role="form" method="POST" class="" action="{{ route('profile.password.update') }}">
                                {!! csrf_field() !!}
                                <label class="control-label label-input" for="password">Nueva contraseña</label>
                                <div>
                                    <input type="password" class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}" name="password" id="password">

                                    @if ($errors->has('password'))
                                    <span class="invalid-feedback">
                                        {{ $errors->first('password') }}
                                    </span>
                                    @endif
                                </div>
                                <label class="control-label mt-3 label-input" for="password_confirmation">Confirmar nueva contraseña</label>
                                <div>
                                    <input type="password" class="form-control {{ $errors->has('password_confirmation') ? 'is-invalid' : '' }}" name="password_confirmation" id="password_confirmation">

                                    @if ($errors->has('password_confirmation'))
                                    <span class="invalid-feedback">
                                        {{ $errors->first('password_confirmation') }}
                                    </span>
                                    @endif
                                </div>
                                <button class="btn btn-block btn-secondary mt-3" type="submit">Cambiar contraseña</button>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
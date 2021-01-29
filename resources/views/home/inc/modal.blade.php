<div class="modal fade" id="ganaEntradas" tabindex="-1" role="dialog" aria-labelledby="ganaEntradasTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content" style="overflow: hidden !important; border-radius: 10px; border-color: #1f1f1f; border-width: 2px;">
            <div>
                <button style="position: absolute; right: 10px; top: 10px;" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="badge badge-danger">&times;</span>
                </button>
                <img src="{{ asset('images/entradas.jpg') }}" alt="">
            </div>
            <div class="p-4" style="border-radius: 0px; background-color: #1f1f1f;">
                @if($errors->hasAny())
                <div class="alert alert-danger"><i class="la la-exclamation-circle mr-2"></i>
                    @if ($errors->has('general'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('general') }}</strong>
                    </span>
                    @else
                    Revisá los campos con errores y volvé a intentarlo.
                    @endif
                </div>
                @endif
                <p class="text-light" style="font-size: 15px;">Dejanos tu nombre, tu email y <span class="text-primary">ganate dos entradas</span> para ver a Maxi:</p>
                <form action="{{ route('popup.register') }}" class="my-3" method="POST">
                    @csrf
                    <input type="text" value="{{ old('name') }}" name="name" class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="Nombre">
                    @if ($errors->has('email'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                    @endif
                    
                    <input type="email" value="{{ old('email') }}" name="email" class="form-control mt-2 {{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="Email">
                    @if ($errors->has('email'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                    @endif
                    <div class="mt-3">
                        <button type="submit" class="btn btn-secondary"><i class="la la-arrow-right"></i> Ganarme las entradas</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
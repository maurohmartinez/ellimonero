@component('mail::message')

<img src="{{ url('images/logos/logo-800.png') }}" alt="Logo El Limonero" style="width: 250px; height: 178px; margin-bottom: 20px;">

# ¡{{ $user->name }}, felicitaciones!

<p>Has ganado la subasta del producto <strong>{{ $product->name }}</strong> con tu oferta de <strong>${{ $product->bids()->winner()->first()->bid }}</strong> en <i>El Limonero Digital</i>.</p>
<p>El producto fue agregado a tu carrito de compras y tu próximo paso es completar el proceso en tu checkout.</p>

@component('mail::button', ['url' => route('checkout')])
Completar checkout
@endcomponent

<p>Ante cualquier duda comunicate con nosotros.</p>

¡Gracias por participar!<br>
{{ config('app.name') }}
@endcomponent
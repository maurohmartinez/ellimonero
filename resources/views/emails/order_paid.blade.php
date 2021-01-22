@component('mail::message')

<img src="{{ url('images/logos/logo-800.png') }}" alt="Logo El Limonero" style="width: 250px; height: 178px; margin-bottom: 20px;">

# Detalles de tu orden

@component('mail::table')
| Producto      | Cantidad        | Precio |
| :------------ | :------------ | :------- |
@foreach($order->products as $product)
| {{ $product['name'] }}  | {{ $product['quantity'] }} | ${{ $product['price'] }} |
@endforeach
| <strong>Total a pagar</strong> |  | <strong>${{ $order['total'] }}</strong> |
@endcomponent

# Detalles de tu pago

@component('mail::table')
| Descripción       | Valor |
| :---------------- | :------------ |
| Mercadopago ID    | {{ $order->payment->mp['payment_id'] }} |
| Estado            | {{ $order->payment->status }} |
| Fecha             | {{ $order->payment->mp['date_approved'] }} |
| Descripción       | {{ $order->payment->mp['description'] }} |
| Tarjeta           | {{ ucfirst($order->payment->mp['payment_method_id']) }} |
| Tipo              | {{ ucfirst($order->payment->mp['payment_type_id']) }} |
| Total abonado     | <strong><span style="color: green;">${{ $order->payment->mp['transaction_amount'] }}</span></strong> |
@endcomponent

<p>Ante cualquier duda comunicate con nosotros.</p>

@component('mail::button', ['url' => route('profile.orders')])
Ver mis compras
@endcomponent

¡Gracias por tu compra!<br>
{{ config('app.name') }}
@endcomponent

<div class="account-content-wrapper">
    <div class="container">
        @include('flash')
        <div class="row">
            <div class="col-xl-3">
                <div class="account-order-list">
                    <ul>
                        <li>
                            <a href="{{ route('profile') }}">
                                <div class="order-list-wrapper">
                                    <div class="order-list-img">
                                        <img src="{{ asset('images/svg/edit.svg') }}" alt="">
                                    </div>
                                    <p>Editar datos</p>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('profile.orders') }}">
                                <div class="order-list-wrapper">
                                    <div class="order-list-img">
                                        <img src="{{ asset('images/svg/shop-card.svg') }}" alt="">
                                    </div>
                                    <p>Compras</p>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('backpack.auth.logout') }}">
                                <div class="order-list-wrapper">
                                    <div class="order-list-img">
                                        <img src="{{ asset('images/svg/logout.svg') }}" alt="">
                                    </div>
                                    <p>Salir</p>
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-xl-9">
                <div class="row">
                    <div class="col-12 col-md-6 mb-4">
                        <h4 class="mb-2">Orden</h4>
                        <h6 class="mb-1">Orden número: <span class="text-secondary font-weight-light">{{ $order->number }}</span></h6>
                        <h6 class="mb-1">Fecha: <span class="text-secondary font-weight-light">{{ $order->created_at->isoFormat('LLL') }}</span></h6>
                        <h6 class="mb-1">Observaciones: <span class="text-secondary font-weight-light">{{ $order->observations ?? '-' }}</span></h6>
                        <h6 class="mb-1">Estado: <span class="font-weight-light {{ $order->status == 'paid' ? 'text-success' : 'text-danger' }}">{{ $order->status == 'paid' ? 'Completa' : 'Pendiente de pago' }}</span></h6>

                    </div>
                    <div class="col-12 col-md-6 mb-4">
                        <h4 class="mb-2">Pagp</h4>
                        <h6 class="mb-1">Mercadopago ID: <span class="text-secondary font-weight-light">{{ $order->payment->mp['payment_id'] }}</span></h6>
                        <h6 class="mb-1">Fecha: <span class="text-secondary font-weight-light">{{ $order->payment->mp['date_approved'] }}</span></h6>
                        <h6 class="mb-1">Tarjeta: <span class="font-weight-light">{{ ucfirst($order->payment->mp['payment_method_id']) }}</span></h6>
                        <h6 class="mb-1">Tipo: <span class="font-weight-light">{{ ucfirst($order->payment->mp['payment_type_id']) }}</span></h6>
                        <h6 class="mb-1">Estado: <span class="font-weight-light {{ $order->payment->status == 'approved' ? 'text-success' : 'text-danger' }}">{{ $order->payment->status }}</span></h6>
                        <h6 class="mb-1">Total abonado : <span class="font-weight-light">${{ $order->payment->mp['transaction_amount'] }}</span></h6>
                    </div>
                </div>
                <h4 class="mb-2">Productos</h4>
                <div class="account-table-wrapper bg-custom-table">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Producto</th>
                                <th scope="col">Precio/u</th>
                                <th scope="col">Cantidad</th>
                                <th scope="col">Subtotal</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($order->products as $item)
                            <tr>
                                <td data-title="Producto">{{ $item['name'] }}</th>
                                <td data-title="Precio/u">${{ $item['price'] }}</th>
                                <td data-title="Cantidad">{{ $item['quantity'] }}</th>
                                <td data-title="Subtotal">${{ $item['price'] * $item['quantity'] }}</th>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="product-table">
                    <div class="checkout-dtls mb-0 p-2 flex-column">
                        <div class="checkout-total-cost checkout-comon-width text-right d-flex align-items-center pl-3">
                            <h4 class="p-0">Total</h4>
                            <h3 class="ml-2 p-0">${{ $order->total }}</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
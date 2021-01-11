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
                        <li class="active">
                            <a href="#">
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
                <div class="account-table-wrapper bg-custom-table">
                    @if(count($orders) > 0)
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Orden</th>
                                <th scope="col">Fecha</th>
                                <th scope="col">Estado</th>
                                <th scope="col">Productos</th>
                                <th scope="col">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($orders as $order)
                            <tr>
                                <td data-title="Orden ID">#{{ $order->number }}</th>
                                <td data-title="Fecha">{{ $order->created_at->isoFormat('LL') }}</td>
                                <td data-title="Estado">
                                    @if($order->status === 'paid')
                                    <a href="{{ route('profile.order', ['order_number' => $order->number]) }}" class="badge badge-success text-dark">Orden completa</a>
                                    @else
                                    <a href="{{ route('checkout.payment', ['order_number' => $order->number]) }}" class="badge badge-danger text-light">Pendiente de pago</a>
                                    @endif
                                </td>
                                <td data-title="Productos">{{ $order->products_list }}</td>
                                <td data-title="Total">${{ $order->total }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @else
                    <div class="alert alert-danger">No tenés ninguna orden.</div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@extends('layouts.app')

@section('content')
<div class="account-content-wrapper">
    <div class="container">
        <div class="row">
            @include('profile.inc.nav', ['tab' => 'orders'])
            <div class="col-xl-9">
                @include('flash')
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
@endsection
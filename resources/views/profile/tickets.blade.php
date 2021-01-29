@extends('layouts.app')

@section('content')
<div>
    @include('profile.inc.banner_tickets')
    <div class="container">
        <div class="row pt-4">
            @include('profile.inc.nav', ['tab' => 'tickets'])
            <div class="col-xl-9">
                @include('flash')
                <div class="account-table-wrapper bg-custom-table">
                    @if(count($tickets) > 0)
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Código</th>
                                <th scope="col">Descripción</th>
                                <th scope="col">Fecha</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($tickets as $ticket)
                            <tr>
                                <td data-title="Código">{{ strtoupper('#QR-' . $ticket->token . '-' . $ticket->id) }}</th>
                                <td data-title="Descripción">{{ $ticket->description }}</td>
                                <td data-title="Fecha">A confirmar</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @else
                    <div class="alert alert-danger">No tenés ningún ticket.</div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
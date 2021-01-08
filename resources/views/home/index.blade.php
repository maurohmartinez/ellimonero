@extends('layouts.app')

@section('content')
@include('home.inc.banner')
@include('home.inc.links')
@include('home.inc.cards')
@include('home.inc.shop')
@include('home.inc.quote')

@endsection
@section('scripts')

@if(App\Models\Popup::activo()->exists())
<script>
    (function() {
        // Popup
        // setTimeout(function() {
        //     $('#popup').modal('show');
        // }, 2000);
    })();
</script>
@endif

@endsection
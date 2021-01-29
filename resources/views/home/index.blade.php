@extends('layouts.app')

@section('content')

@include('home.inc.banner')
@include('home.inc.links')
@include('home.inc.banner_sub')
@include('home.inc.banner_cat')
@include('home.inc.modal')

@endsection

@if(!backpack_auth()->check())
@section('scripts')
<script>
    setTimeout(() => {
        $('#ganaEntradas').modal('show');
    }, '{{ Session::get("popupFeedback") ? 0 : 4000 }}');
</script>
@endsection
@endif
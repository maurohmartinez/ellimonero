@extends('layout.app')

@section('content')

@include('home.inc.banner')
@include('home.inc.section_1')
@include('home.inc.section_2')
@include('home.inc.section_3')
@include('home.inc.call_to_action_1')
@include('home.inc.sponsors')
@include('home.inc.section_4')
@include('home.inc.section_5')
@include('home.inc.call_to_action_2')
@include('home.inc.product_modal')
@endsection

@section('scripts')
<script>
    $(window).scroll(function() {
        if ($(window).scrollTop() >= 300) {
            $('#top-nav-bar').addClass('solid');
        } else {
            $('#top-nav-bar').removeClass('solid');
        }
    });
</script>
@endsection
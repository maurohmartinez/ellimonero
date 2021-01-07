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
@if(App\Models\Popup::activo()->exists())
@include('home._popup')
@endif
@endsection

@section('scripts')

<script>
    (function() {
        // Update top nav color whe scroll
        $(window).scroll(function() {
            if ($(window).scrollTop() >= 300) {
                $('#top-nav-bar').addClass('solid');
            } else {
                $('#top-nav-bar').removeClass('solid');
            }
        });
    })();
</script>

@if(App\Models\Popup::activo()->exists())
<script>
    (function() {
        // Popup
        setTimeout(function() {
            $('#popup').modal('show');
        }, 2000);
    })();
</script>
@endif

@endsection
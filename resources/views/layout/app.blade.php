<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<html data-wf-page="5db7ae94fce786ee9399af97" data-wf-site="5db7ae94fce7860a5799af95">

<head>
    <meta charset="utf-8">
    <meta property="og:locale" content="es-ES" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>El Limonero{{ ($title ?? null) ? ' :: ' . $title : '' }}</title>
    <meta name="description" content="">
    <meta name="keywords" content="sushi, delivery">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta property="og:title" content="El Limonero" />
    <meta property="og:url" content="https://ellimonero.com" />
    <meta property="og:description" content="">
    <meta property="og:image" content="{{-- asset('images/logos/logo_300.png') --}}">
    <meta property="og:type" content="website" />

    <!-- <link rel="icon" sizes="16x16 32x32 64x64" href="{{ asset('images/favicon/favicon.ico') }}">
    <link rel="icon" type="image/png" sizes="196x196" href="{{ asset('images/favicon/favicon-192.png') }}">
    <link rel="icon" type="image/png" sizes="160x160" href="{{ asset('images/favicon/favicon-160.png') }}">
    <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('images/favicon/favicon-96.png') }}">
    <link rel="icon" type="image/png" sizes="64x64" href="{{ asset('images/favicon/favicon-64.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('images/favicon/favicon-32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('images/favicon/favicon-16.png') }}">
    <link rel="apple-touch-icon" href="{{ asset('images/favicon/favicon-57.png') }}">
    <link rel="apple-touch-icon" sizes="114x114" href="{{ asset('images/favicon/favicon-114.png') }}">
    <link rel="apple-touch-icon" sizes="72x72" href="{{ asset('images/favicon/favicon-72.png') }}">
    <link rel="apple-touch-icon" sizes="144x144" href="{{ asset('images/favicon/favicon-144.png') }}">
    <link rel="apple-touch-icon" sizes="60x60" href="{{ asset('images/favicon/favicon-60.png') }}">
    <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('images/favicon/favicon-120.png') }}">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('images/favicon/favicon-76.png') }}">
    <link rel="apple-touch-icon" sizes="152x152" href="{{ asset('images/favicon/favicon-152.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('images/favicon/favicon-180.png') }}">
    <meta name="msapplication-TileColor" content="#FFFFFF">
    <meta name="msapplication-TileImage" content="{{ asset('images/favicon/favicon-144.png') }}">
    <meta name="msapplication-config" content="{{ asset('images/favicon/browserconfig.xml') }}"> -->

    <link href="{{ url('/').mix('css/app.css') }}" rel="stylesheet">
    <!-- [if lt IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js" type="text/javascript"></script><![endif] -->
    <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js" type="text/javascript"></script>
    <script type="text/javascript">
        WebFont.load({
            google: {
                families: ["Montserrat:100,100italic,200,200italic,300,300italic,400,400italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic", "Gothic A1:100,200,300,regular,500,600,700,800,900"]
            }
        });
    </script>
    <script type="text/javascript">
        ! function(o, c) {
            var n = c.documentElement,
                t = " w-mod-";
            n.className += t + "js", ("ontouchstart" in o || o.DocumentTouch && c instanceof DocumentTouch) && (n.className += t + "touch")
        }(window, document);
    </script>
    <link href="https://via.placeholder.com/1000x600.png?text=IMAGE" rel="shortcut icon" type="image/x-icon">
    <link href="https://via.placeholder.com/1000x600.png?text=IMAGE" rel="apple-touch-icon">
    <!-- <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/font-awesome-line-awesome/css/all.min.css"> -->
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    @yield('styles')
</head>

<body>
    @include('layout.inc.nav')
    @yield('content')
    @include('layout.inc.footer')
    @stack('scripts')
    <script src="{{ url('/').mix('/js/app.js') }}"></script>
    @yield('scripts')
    <!-- [if lte IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/placeholders/3.0.2/placeholders.min.js"></script><![endif] -->
</body>

</html>
<meta charset="utf-8">
<meta property="og:locale" content="es-ES" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>El Limonero digital{{ ($title ?? null) ? ' :: ' . $title : '' }}</title>
<meta name="description" content="">
<meta name="keywords" content="">
<meta name="csrf-token" content="{{ csrf_token() }}">
<link rel="icon" sizes="16x16 32x32 64x64" href="{{ asset('images/favicon/favicon.ico') }}">
<meta property="og:title" content="El Limonero digital" />
<meta property="og:url" content="https://ellimonero.com" />
<meta property="og:description" content="">
<meta property="og:image" content="{{ asset('images/logos/logo-300.png') }}">
<meta property="og:type" content="website" />

<link rel="apple-touch-icon" sizes="57x57" href="{{ asset('images/favicon/apple-icon-57x57.png') }}">
<link rel="apple-touch-icon" sizes="60x60" href="{{ asset('images/favicon/apple-icon-60x60.png') }}">
<link rel="apple-touch-icon" sizes="72x72" href="{{ asset('images/favicon/apple-icon-72x72.png') }}">
<link rel="apple-touch-icon" sizes="76x76" href="{{ asset('images/favicon/apple-icon-76x76.png') }}">
<link rel="apple-touch-icon" sizes="114x114" href="{{ asset('images/favicon/apple-icon-114x114.png') }}">
<link rel="apple-touch-icon" sizes="120x120" href="{{ asset('images/favicon/apple-icon-120x120.png') }}">
<link rel="apple-touch-icon" sizes="144x144" href="{{ asset('images/favicon/apple-icon-144x144.png') }}">
<link rel="apple-touch-icon" sizes="152x152" href="{{ asset('images/favicon/apple-icon-152x152.png') }}">
<link rel="apple-touch-icon" sizes="180x180" href="{{ asset('images/favicon/apple-icon-180x180.png') }}">
<link rel="icon" type="image/png" sizes="192x192" href="{{ asset('images/favicon/android-icon-192x192.png') }}">
<link rel="icon" type="image/png" sizes="32x32" href="{{ asset('images/favicon/favicon-32x32.png') }}">
<link rel="icon" type="image/png" sizes="96x96" href="{{ asset('images/favicon/favicon-96x96.png') }}">
<link rel="icon" type="image/png" sizes="16x16" href="{{ asset('images/favicon/favicon-16x16.png') }}">
<link rel="manifest" href="{{ asset('images/favicon/manifest.json') }}">
<meta name="msapplication-TileColor" content="#ffffff">
<meta name="msapplication-TileImage" content="{{ asset('images/favicon//ms-icon-144x144.png') }}">
<meta name="theme-color" content="#ffffff">
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-PM8RLDBZC5"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());
  gtag('config', 'G-PM8RLDBZC5');
</script>
<link href="{{ url('/').mix('css/app.css') }}" rel="stylesheet">
<!-- <link href="https://via.placeholder.com/1000x600.png?text=IMAGE" rel="shortcut icon" type="image/x-icon"> -->
<!-- <link href="https://via.placeholder.com/1000x600.png?text=IMAGE" rel="apple-touch-icon"> -->
<link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
@yield('styles')
@livewireStyles
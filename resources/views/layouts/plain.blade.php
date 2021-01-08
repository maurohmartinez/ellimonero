<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<html data-wf-page="5db7ae94fce786ee9399af97" data-wf-site="5db7ae94fce7860a5799af95" data-theme="dark">

<head>
  @include('layouts.inc.head')
</head>

<body style="overflow-x: hidden; height: 100vh;">
  
  @yield('content')
  
  <!-- Jquery -->
  <script src="/js/template/default-js/jquery-3.3.1.min.js"></script>
  <script src="/js/template/default-js/jquery-migrate-1.4.1.min.js"></script>
  <script src="/js/template/default-js/popper.js"></script>
  <script src="/js/template/default-js/bootstrap.min.js"></script>
  <!--searchbox js-->
  <script src="/js/template/plugin/jquery.hideseek.min.js"></script>
  <!--isotop js-->
  <script src="/js/template/plugin/isotop-pakage-min.js"></script>
  <!-- IMAGE LOADED JS -->
  <script src="/js/template/plugin/imagesloaded.pkgd.min.js"></script>
  <!-- owl carousel -->
  <script src="/js/template/plugin/owl-carousel/owl.carousel.min.js"></script>
  <script src="/js/template/plugin/owl-carousel/owl-custom.js"></script>
  <!--video popup-->
  <script src="/js/template/plugin/youtube-overlay.js"></script>
  <!-- highlight js -->
  <script src="/js/template/plugin/highlight.min.js"></script>

  <!--nice-select js here-->
  <script src="/js/template/plugin/nice-select/jquery.nice-select.min.js"></script>
  <script src="/js/template/scripts.js"></script>
  <script src="{{ url('/').mix('/js/app.js') }}"></script>
  @yield('scripts')
</body>

</html>
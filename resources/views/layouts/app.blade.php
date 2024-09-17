<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

  <meta charset="utf-8" />
  <title>{{ config('app.name', 'Laravel') }}</title>
  <meta content="ie=edge" http-equiv="x-ua-compatible" />
  <meta content="" name="description" />
  <meta content="width=device-width, initial-scale=1" name="viewport" />
  <meta content="" property="og:title" />
  <meta content="" property="og:type" />
  <meta content="" property="og:url" />
  <meta content="" property="og:image" />
  <!-- Favicon -->
  <link href="{{ asset('assets/imgs/favicon-2.png') }}" rel="shortcut icon" type="image/x-icon" />
  <!-- Template CSS -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.4.2/css/all.min.css" rel="stylesheet">
  <link href="{{ asset('assets/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">
  <link href="{{ asset('assets/css/plugins/slider-range.css') }}" rel="stylesheet" />
  <link href="{{ asset('assets/css/klbicon.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/css/main.css?v=5.6') }}" rel="stylesheet" />

  @livewireStyles
</head>

<body>
  <div id="app">

    @include('layouts.includes.frontend.nav')

    <main>
      @yield('content')
    </main>

    @include('layouts.includes.frontend.footer')

  </div>

  <script src="{{ asset('assets/js/vendor/modernizr-3.6.0.min.js') }}"></script>
  <script src="{{ asset('assets/js/vendor/jquery-3.6.0.min.js') }}"></script>
  <script src="{{ asset('assets/js/vendor/jquery-migrate-3.3.0.min.js') }}"></script>
  <script src="{{ asset('assets/js/vendor/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('assets/js/plugins/slick.js') }}"></script>
  <script src="{{ asset('assets/js/plugins/jquery.syotimer.min.js') }}"></script>
  <script src="{{ asset('assets/js/plugins/wow.js') }}"></script>
  <script src="{{ asset('assets/js/plugins/slider-range.js') }}"></script>
  <script src="{{ asset('assets/js/plugins/perfect-scrollbar.js') }}"></script>
  <script src="{{ asset('assets/js/plugins/magnific-popup.js') }}"></script>
  <script src="{{ asset('assets/js/plugins/select2.min.js') }}"></script>
  <script src="{{ asset('assets/js/plugins/waypoints.js') }}"></script>
  <script src="{{ asset('assets/js/plugins/counterup.js') }}"></script>
  <script src="{{ asset('assets/js/plugins/jquery.countdown.min.js') }}"></script>
  <script src="{{ asset('assets/js/plugins/images-loaded.js') }}"></script>
  <script src="{{ asset('assets/js/plugins/isotope.js') }}"></script>
  <script src="{{ asset('assets/js/plugins/scrollup.js') }}"></script>
  <script src="{{ asset('assets/js/plugins/jquery.vticker-min.js') }}"></script>
  <script src="{{ asset('assets/js/plugins/jquery.theia.sticky.js') }}"></script>
  <script src="{{ asset('assets/js/plugins/jquery.elevatezoom.js') }}"></script>
  <script src="{{ asset('assets/js/plugins/hover-slider.min.js') }}"></script>
  <script src="{{ asset('assets/js/hoverslider.js') }}"></script>
  <script src="{{ asset('assets/js/productHover.js') }}"></script>

  <!-- Template  JS -->
  <script src="{{ asset('assets/js/main.js?v=5.6') }}"></script>
  <script src="{{ asset('assets/js/shop.js?v=5.6') }}"></script>
  @livewireScripts

  <script>
    let tabs = document.getElementsByClassName('nav-tab');

    if (window.innerWidth < 992) {
      for (let i = 0; i <= tabs.length; i++) {
        tabs[i].addEventListener('click', function() {
          document.getElementById('tab-list').style.display = 'none';
          document.getElementById('tab-content').style.display = 'block';
        });
      }

      let arrows = document.getElementsByClassName('back-arrow');

      for (let i = 0; i <= arrows.length; i++) {
        arrows[i].addEventListener('click', function() {
          document.getElementById('tab-list').style.display = 'block';
          document.getElementById('tab-content').style.display = 'none';
        });
      }
    }



    $(window).resize(function() {

      if (window.innerWidth > 768) {
        document.getElementById('tab-list').style.display = 'block';
        document.getElementById('pref-info').style.display = 'block';
      }
    });
  </script>

  @stack('scripts')

</body>

</html>

<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">

   <!-- CSRF Token -->
   <meta name="csrf-token" content="{{ csrf_token() }}">

   <title>{{ config('app.name', 'Laravel') }}</title>

   <!-- Fonts -->
   <link rel="dns-prefetch" href="//fonts.bunny.net">
   <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">


   <meta property="og:title" content="">
   <meta property="og:type" content="">
   <meta property="og:url" content="">
   <meta property="og:image" content="">
   <!-- Favicon -->
   <link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/imgs/favicon-2.png')}}" />
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.4.2/css/all.min.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/15.7.1/nouislider.min.css">
   
   <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.9.0/dist/sweetalert2.min.css" rel="stylesheet">
   <link rel="stylesheet" href="{{asset('assets/css/font-awesome.min.css')}}">
   <link rel="stylesheet" href="{{asset('assets/css/main.css')}}">
   <link rel="stylesheet" href="{{asset('assets/css/custom.css')}}">

   <!-- Scripts -->
   {{-- @vite(['resources/sass/app.scss', 'resources/js/app.js']) --}}
   @livewireStyles
</head>
<body>
   <div id="app">

      @if (request()->is('my-account/*'))
         <style>
            @media (max-width: 991px){
               /* user account */
               #tab-list {
                  display: none;
               }
            }
         </style>
      @endif

      @if (request()->is('my-account'))
         <style>
            @media (max-width: 991px){
               /* user account */
               #tab-content {
                  display: none;
               }
            }
         </style>
      @endif

      @include('layouts.includes.frontend.nav')

      <main>
         <main class="main">
            <div class="page-header breadcrumb-wrap">
               <div class="container">
                  <div class="breadcrumb">
                     <a href="/" rel="nofollow">Home</a>                    
                     <span></span> My Account
                  </div>
               </div>
            </div>
            <section class="account-container">
               <div class="container">
                  <div class="row">
                     <div class="col-lg-11 m-auto">
                        <div class="row">
                           <div class="col-lg-3" id="tab-list" wire:ignore>
                              @include('layouts.includes.user.nav')
                           </div>

                           <div class="col-lg-9" id="tab-content">
                              <div class="tab-content dashboard-content">     
                                 @yield('content')
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </section>
         </main>
      </main>

      @include('layouts.includes.frontend.footer')


   </div>




   <script src="{{asset('assets/js/vendor/modernizr-3.6.0.min.js')}}"></script>
   <script src="{{asset('assets/js/vendor/jquery-3.6.0.min.js')}}"></script>
   <script src="{{asset('assets/js/vendor/jquery-migrate-3.3.0.min.js')}}"></script>
   <script src="{{asset('assets/js/vendor/bootstrap.bundle.min.js')}}"></script>
   <script src="{{asset('assets/js/plugins/slick.js')}}"></script>
   <script src="{{asset('assets/js/plugins/jquery.syotimer.min.js')}}"></script>
   <script src="{{asset('assets/js/plugins/wow.js')}}"></script>
   <script src="{{asset('assets/js/plugins/jquery-ui.js')}}"></script>
   <script src="{{asset('assets/js/plugins/perfect-scrollbar.js')}}"></script>
   <script src="{{asset('assets/js/plugins/magnific-popup.js')}}"></script>
   <script src="{{asset('assets/js/plugins/select2.min.js')}}"></script>
   <script src="{{asset('assets/js/plugins/waypoints.js')}}"></script>
   <script src="{{asset('assets/js/plugins/counterup.js')}}"></script>
   <script src="{{asset('assets/js/plugins/jquery.countdown.min.js')}}"></script>
   <script src="{{asset('assets/js/plugins/images-loaded.js')}}"></script>
   <script src="{{asset('assets/js/plugins/isotope.js')}}"></script>
   <script src="{{asset('assets/js/plugins/scrollup.js')}}"></script>
   <script src="{{asset('assets/js/plugins/jquery.vticker-min.js')}}"></script>
   <script src="{{asset('assets/js/plugins/jquery.theia.sticky.js')}}"></script>
   <script src="{{asset('assets/js/plugins/jquery.elevatezoom.js')}}"></script>
   <!-- Template  JS -->
   <script src="{{asset('assets/js/main.js?v=3.3')}}"></script>
   <script src="{{asset('assets/js/shop.js?v=3.3')}}"></script></body>


   <script src="{{ asset('js/share.js') }}"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/15.7.1/nouislider.min.js"></script>

   <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.9.0/dist/sweetalert2.all.min.js"></script>

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

<footer class="main">
   <section class="newsletter mt-50 text-white wow fadeIn animated">
      <div class="container">
         <div class="row align-items-center">
            <div class="col-lg-7 mb-md-3 mb-lg-0">
               <div class="row align-items-center">
                  <div class="col flex-horizontal-center">
                     <img class="icon-email" style="width: 90px" src="{{asset('assets/imgs/theme/icons/icon-email.svg')}}" alt="email icon">
                     <h4 class="font-size-20 mb-0 ms-3dd">Sign up to Newsletter</h4>
                  </div>
                  <div class="col my-4 my-md-0 des">
                     <h5 class="font-size-15 ml-4dd mb-0">...and receive <strong>$25 coupon for first shopping.</strong></h5>
                  </div>
               </div>
            </div>
            <div class="col-lg-5">
               <livewire:frontend.newsletter />
            </div>
         </div>
      </div>
   </section>
   @php
      $settings = DB::table('settings')->where('id', 1)->first();
   @endphp
   <section class="section-padding footer-mid">
      <div class="container pt-15 pb-20">
         <div class="row">
            <div class="col-lg-4 col-md-6">
               <div class="widget-about font-md mb-md-5 mb-lg-0">
                  <div class="logo mb-10">
                     <a href="/" class="mb-3"><img src="{{asset('storage/photos/'.$settings->logo)}}" alt="logo" width="230px"/></a>
                     <p class="font-lg text-heading">Awesome African Craft website template</p>
                  </div>
                  <ul class="contact-infor">
                     <li>
                        <img src="{{asset('assets/imgs/theme/icons/icon-location.svg')}}" alt="location" />
                        <strong>Address: </strong>
                        <span>{{$settings->address}}</span>
                     </li>
                     <li>
                        <img src="{{asset('assets/imgs/theme/icons/icon-contact.svg')}}" alt="contact" />
                        <strong>Call Us:</strong><span> {{$settings->phone}}</span>
                     </li>
                     <li>
                        <img src="{{asset('assets/imgs/theme/icons/icon-email-2.svg')}}" alt="email" />
                        <strong>Email:</strong>
                        <span><a href="" class="__cf_email__" >{{$settings->email}}</a></span>
                     </li>
                     <li>
                        <img src="{{asset('assets/imgs/theme/icons/icon-clock.svg')}}" alt="clock" />
                        <strong>Hours:</strong><span> 10:00 - 18:00, Mon - Sat</span>
                     </li>
                  </ul>
               </div>
            </div>
            <div class="col-lg-2 col-md-3">
               <h5 class="mb-3 wow fadeIn animated">About</h5>
               <ul class="footer-list wow fadeIn animated mb-sm-5 mb-md-0">
                  <li><a href="{{url('/about')}}">About Us</a></li>
                  <li><a href="#">Delivery Information</a></li>
                  <li><a href="{{url('/privacy-policy')}}">Privacy Policy</a></li>
                  <li><a href="{{url('/terms-&-conditions')}}">Terms &amp; Conditions</a></li>
                  <li><a href="{{url('/contact')}}">Contact Us</a></li>                            
               </ul>
            </div>
            <div class="col-lg-2  col-md-3">
               <h5 class="mb-3 wow fadeIn animated">My Account</h5>
               <ul class="footer-list wow fadeIn animated">
                  <li><a href="{{url('my-account/dashboard')}}">My Account</a></li>
                  <li><a href="{{url('/cart')}}">View Cart</a></li>
                  <li><a href="{{url('/wishlist')}}">My Wishlist</a></li>
                  <li><a href="{{url('/my-account/track-order')}}">Track My Order</a></li>                            
                  <li><a href="{{url('/my-account/orders')}}">Orders</a></li>
               </ul>
            </div>
            <div class="col-lg-4 mob-center">
               <h5 class="mb-3 wow fadeIn animated">Install App</h5>
               <div class="row">
                  <div class="col-md-8 col-lg-12">
                     <p class="wow fadeIn animated">From App Store or Google Play</p>
                     <div class="download-app wow fadeIn animated mob-app">
                        <a href="#" class="hover-up mb-sm-4 mb-lg-0"><img class="active" src="{{asset('assets/imgs/theme/app-store.jpg')}}" alt="app store"></a>
                        <a href="#" class="hover-up"><img src="{{asset('assets/imgs/theme/google-play.jpg')}}" alt="google play store"></a>
                     </div>
                  </div>
               </div>
               <div class="mobile-social-icon text-end">
                  <h6>Follow Us</h6>
                  <a href="{{$settings->facebook}}"><img src="{{asset('assets/imgs/theme/icons/icon-facebook-white.svg')}}" alt="facebook" /></a>
                  <a href="{{$settings->twitter}}"><img src="{{asset('assets/imgs/theme/icons/icon-twitter-white.svg')}}" alt="twitter" /></a>
                  <a href="{{$settings->instagram}}"><img src="{{asset('assets/imgs/theme/icons/icon-instagram-white.svg')}}" alt="instagram" /></a>
                  <a href="{{$settings->facebook}}"><img src="{{asset('assets/imgs/theme/icons/icon-pinterest-white.svg')}}" alt="pinterest" /></a>
                  <a href="{{$settings->facebook}}"><img src="{{asset('assets/imgs/theme/icons/icon-youtube-white.svg')}}" alt="youtube" /></a>
               </div>
               <p class="font-sm">Up to 15% discount on your first subscribe</p>
            </div>
         </div>
      </div>
   </section>
   <div class="container pb-20 wow fadeIn animated mob-center">
      <div class="row">
         <div class="col-12 mb-20">
            <div class="footer-bottom"></div>
         </div>
         <div class="col-lg-6">
            <p class="float-md-left font-sm text-muted mb-0">
               <a href="{{url('privacy-policy')}}">Privacy Policy</a> | <a href="{{url('terms-&-conditions')}}">Terms & Conditions</a>
            </p>
         </div>
         <div class="col-lg-6">
            <p class="text-lg-end font-sm mb-0">&copy; {{date('Y')}}, <strong class="text-brand">Nest African Crafts</strong> -
               All rights reserved
            </p>         
         </div>
      </div>
   </div>
</footer> 
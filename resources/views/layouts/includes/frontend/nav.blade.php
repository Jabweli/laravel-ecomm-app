<!-- header -->
@php
   $settings = DB::table('settings')->where('id', 1)->first();
@endphp
<header class="header-area header-style-1 header-height-2">
   <div class="header-border"></div>
   <div class="header-top header-top-ptb-1 d-none d-lg-block">
      <div class="container">
         <div class="row align-items-center">
            <div class="col-xl-3 col-lg-4">
               <div class="header-info">
                  <ul>
                     <li><a href="/about">About Us</a></li>
                     <li><a href="/my-account">My Account</a></li>
                     <li><a href="/my-account/track-order">Order Tracking</a></li>
                  </ul>
               </div>
            </div>
            <div class="col-xl-9 col-lg-8">
               <div class="header-info header-info-right">
                  <ul>
                     <li>Need help? Call us: {{$settings->phone}} or {{$settings->email}}</li>
                     <li>
                        <a class="language-dropdown-active" href="#">English <i
                              class="fi-rs-angle-small-down"></i></a>
                        <ul class="language-dropdown">
                           <li>
                              <a href="#"><img src="{{asset('assets/imgs/theme/flag-fr.png')}}" alt="flag" />Français</a>
                           </li>
                           <li>
                              <a href="#"><img src="{{asset('assets/imgs/theme/flag-dt.png')}}" alt="flag" />Deutsch</a>
                           </li>
                           <li>
                              <a href="#"><img src="{{asset('assets/imgs/theme/flag-ru.png')}}" alt="flag" />Pусский</a>
                           </li>
                        </ul>
                     </li>
                     <li>
                        <a class="language-dropdown-active" href="#">USD <i class="fi-rs-angle-small-down"></i></a>
                        <ul class="language-dropdown">
                           <li>
                              <a href="#"><img src="{{asset('assets/imgs/theme/flag-fr.png')}}" alt="flag" />INR</a>
                           </li>
                           <li>
                              <a href="#"><img src="{{asset('assets/imgs/theme/flag-dt.png')}}" alt="flag" />MBP</a>
                           </li>
                           <li>
                              <a href="#"><img src="{{asset('assets/imgs/theme/flag-ru.png')}}" alt="flag" />EU</a>
                           </li>
                        </ul>
                     </li>
                  </ul>
               </div>
            </div>
         </div>
      </div>
   </div>

   <!-- header middle -->
   <div class="header-middle header-middle-ptb-1 d-none d-lg-block">
      <div class="container">
         <div class="header-wrap">
            <div class="logo logo-width-1">
               <a href="/"><img src="{{asset('storage/photos/'.$settings->logo)}}" alt="logo" /></a>
            </div>
            <div class="header-right">
               <div class="site-header search-style-2">     
                  <livewire:frontend.search-input />
               </div>

               <div class="header-action-right">
                  <div class="header-action-2">
                     <div class="header-action-icon-2">
                        <a href="#">
                           <img class="svgInject" alt="user-icon" src="{{asset('assets/imgs/theme/icons/icon-user.svg')}}" />
                        </a>

                        @auth
                           <a href="#">
                              <span class="lable ml-0" style="font-weight: bold">{{Auth::user()->name}}</span>
                           </a>
                           
                           <div class="cart-dropdown-wrap cart-dropdown-hm2 account-dropdown">
                              <ul>
                                 @if (Auth::user()->utype === 'ADM')
                                    <li>
                                       <a target="_blank" href="/admin/dashboard"><i class="fi fi-rs-user mr-10"></i>Dashboard</a>
                                    </li>
                                    <li>
                                       <a target="_blank" href="/admin/products"><i class="fi-rs-box mr-10"></i>Products</a>
                                    </li>
                                    <li>
                                       <a target="_blank" href="/admin/orders"><i class="fi-rs-shopping-bag mr-10"></i>Orders</a>
                                    </li>
                                    <li>
                                       <a target="_blank" href="/admin/coupons"><i class="fi-rs-ticket mr-10"></i>Coupons</a>
                                    </li>
                                    <li>
                                       <a target="_blank" href="/admin/product/categories"><i class="fi fi-rs-heart mr-10"></i>Categories</a>
                                    </li>
                                    <li>
                                       <a target="_blank" href="/admin/settings"> <i class="fi fi-rs-settings-sliders mr-10"></i>Settings</a>
                                    </li>
                                    <li>
                                       <a href="{{route('logout')}}" onclick="event.preventDefault(); document.getElementById('logout-form-2').submit();">
                                          <i class="fi fi-rs-sign-out mr-10"></i>Sign out
                                       </a>
                                       <form id="logout-form-2" action="{{ route('logout') }}" method="POST" class="d-none">
                                          @csrf
                                       </form>
                                    </li>
                                 @else
                                    <li>
                                       <a href="/my-account"><i class="fi fi-rs-user mr-10"></i>My Account</a>
                                    </li>
                                    <li>
                                       <a href="/my-account/orders"><i class="fi-rs-shopping-bag mr-10"></i>Orders</a>
                                    </li>
                                    <li>
                                       <a href="/my-account/inbox"><i class="fi-rs-envelope mr-10"></i>Inbox</a>
                                    </li>
                                    <li>
                                       <a href="/my-account/saved-items"><i class="fi fi-rs-heart mr-10"></i>Saved Items</a>
                                    </li>
                                    <li>
                                       <a href="/my-account/address-book"><i class="fi fi-rs-marker mr-10"></i>Address book</a>
                                    </li>
                                    {{-- <li>
                                       <a href="/my-account/account-details"> <i class="fi fi-rs-settings-sliders mr-10"></i>Account Settings</a>
                                    </li> --}}
                                    <li>
                                       <a href="{{route('logout')}}" onclick="event.preventDefault(); document.getElementById('logout-form-2').submit();">
                                          <i class="fi fi-rs-sign-out mr-10"></i>Sign out
                                       </a>
                                       <form id="logout-form-2" action="{{ route('logout') }}" method="POST" class="d-none">
                                          @csrf
                                       </form>
                                    </li>
                                 @endif
                              </ul>
                           </div>
                        @else
                           <a href="#">
                              <span class="lable ml-0" style="font-weight: bold">My Account</span>
                           </a>
                           <div class="cart-dropdown-wrap cart-dropdown-hm2 account-dropdown">
                              <ul>
                                 <li><a href="/login"><i class="fi fi-rs-sign-out mr-10"></i>Sign in</a></li>
                              </ul>
                           </div>
                        @endif
                     </div>

                     <div class="me-2">
                        <livewire:frontend.miniwishlist />
                     </div>

                     <livewire:frontend.minicart />
                     
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>

   
   <div class="header-bottom header-bottom-bg-color sticky-bar">
      <div class="container">
         <div class="header-wrap header-space-between position-relative">
            <div class="logo logo-width-1 d-block d-lg-none">
               <a href="/"><img src="{{asset('storage/photos/'.$settings->logo)}}" alt="logo" /></a>
            </div>
            <div class="header-nav d-none d-lg-flex">
               <div class="main-categori-wrap d-none d-lg-block">
                  <a class="categories-button-active" href="#">
                     <span class="fi-rs-apps"></span>Browse All Categories
                     <i class="fi-rs-angle-down"></i>
                  </a>
                  @php
                     $categories = DB::table('product_categories')->where('status', 1)->get();
                     $sn = 1;
                  @endphp
                  <div class="categories-dropdown-wrap categories-dropdown-active-large font-heading">
                     <div class="categori-dropdown-inner">
                        <ul>
                           @foreach ($categories as $category)
                              <li>
                                 <a href="{{url('products/category/'.$category->slug)}}"> 
                                    <img src="{{asset('assets/imgs/theme/icons/category-'.$sn++.'.svg')}}" alt="" />{{$category->name}}
                                 </a>
                              </li>
                           @endforeach
                        </ul>
                        
                     </div>
                     {{-- <div class="more_slide_open" style="display: none">
                        <div class="d-flex categori-dropdown-inner">
                           <ul>
                              <li>
                                 <a href="#"> <img src="{{asset('assets/imgs/theme/icons/icon-1.svg')}}"
                                       alt="" />Milks and Dairies</a>
                              </li>
                              <li>
                                 <a href="#"> <img src="{{asset('assets/imgs/theme/icons/icon-2.svg')}}"
                                       alt="" />Clothing & beauty</a>
                              </li>
                           </ul>
                           <ul class="end">
                              <li>
                                 <a href="#"> <img src="{{asset('assets/imgs/theme/icons/icon-3.svg')}}"
                                       alt="" />Wines & Drinks</a>
                              </li>
                              <li>
                                 <a href="#"> <img src="{{asset('assets/imgs/theme/icons/icon-4.svg')}}"
                                       alt="" />Fresh Seafood</a>
                              </li>
                           </ul>
                        </div>
                     </div> --}}
                     <div class="more_categories"><span class="icon"></span> <span class="heading-sm-1">Show
                           more...</span></div>
                  </div>
               </div>

               <!-- main menu -->
               <div class="main-menu main-menu-padding-1 main-menu-lh-2 d-none d-lg-block font-heading">
                  <nav>
                     <ul class="text-center">
                        <li>
                           <a class="{{request()->is('/') ? 'active':''}}" href="/">Home</a>
                        </li>
                        <li>
                           <a class="{{request()->is('shop') ? 'active':''}} 
                              {{request()->is('product/*') ? 'active':''}} {{request()->is('products/category/*') ? 'active':''}}" href="/shop">Shop</a>
                        </li>
                        <li class="hot-deals">
                           <img src="{{asset('assets/imgs/theme/icons/icon-hot.svg')}}" alt="hot deals" />
                           <a href="/hot-deals" class="{{request()->is('hot-deals') ? 'active':''}}">Hot Deals</a>
                        </li>
                        
                        <li>
                           <a href="/about" class="{{request()->is('about') ? 'active':''}}">About</a>
                        </li>
                        
                        <li class="position-static">
                           <a href="#">
                              <i class="klbth-icon-ecommerce-discount-black" style="font-size: 16px"></i> 
                              Top Offers <i class="fi-rs-angle-down"></i>
                           </a>
                           <ul class="mega-menu">
                              <h5>Items on sale this week</h5>
                              <span>Top picks this week. Up to 50% off the best selling products.</span>

                              <livewire:frontend.offers-component />
                           </ul>
                        </li>
                        <li>
                           <a href="/blog" class="{{request()->is('blog') ? 'active':''}} 
                              {{request()->is('post/*') ? 'active':''}} {{request()->is('posts/category/*') ? 'active':''}}">Blog</a>
                        </li>
                        <li>
                           <a href="/contact" class="{{request()->is('contact') ? 'active':''}}">Contact</a>
                        </li>
                     </ul>
                  </nav>
               </div>

            </div>
            <div class="hotline d-nonedd d-lg-flex">
               <img src="{{asset('assets/imgs/theme/icons/icon-headphone.svg')}}" alt="hotline" />
               <p>1900 - 888<span>24/7 Support Center</span></p>
            </div>
            <div class="header-action-icon-2 d-block d-lg-none">
               <div class="burger-icon burger-icon-white">
                  <span class="burger-icon-top"></span>
                  <span class="burger-icon-mid"></span>
                  <span class="burger-icon-bottom"></span>
               </div>
            </div>
            <div class="header-action-right d-block d-lg-none cart-wishlist">
               <div class="header-action-2">
                  <div class="me-2">
                     <livewire:frontend.miniwishlist />
                  </div>
                  <div class="">
                     <livewire:frontend.minicart />
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</header>

<div class="mobile-header-active mobile-header-wrapper-style">
   <div class="mobile-header-wrapper-inner">
      <div class="mobile-header-top">
         <div class="mobile-header-logo">
            <a href="/"><img src="{{asset('storage/photos/'.$settings->logo)}}" alt="logo" /></a>
         </div>
         <div class="mobile-menu-close close-style-wrap close-style-position-inherit">
            <button class="close-style search-close">
               <i class="icon-top"></i>
               <i class="icon-bottom"></i>
            </button>
         </div>
      </div>
      <div class="mobile-header-content-area">
         <div class="mobile-search search-style-3 mobile-header-border">
            <form action="{{route('product.search')}}">
               <div class="form-group">
                  <input type="text" name="q" placeholder="Search for items…" />
               </div>
               <button type="submit"><i class="fi-rs-search"></i></button>
            </form>
         </div>
         <div class="mobile-menu-wrap mobile-header-border">
            <!-- mobile menu start -->
            <nav>
               <ul class="mobile-menu font-heading">
                  <li class="menu-item-has-children">
                     <a href="/">Home</a>
                  </li>
                  <li class="menu-item-has-children">
                     <a href="/shop">shop</a>
                  </li>
                  <li class="menu-item-has-children">
                     <a href="/hot-deals">Hot deals</a>
                  </li>
                  <li class="menu-item-has-children">
                     <a href="#">Mega menu</a>
                     <ul class="dropdown">
                        <li class="menu-item-has-children">
                           <a href="#">Women's Fashion</a>
                           <ul class="dropdown">
                              <li><a href="shop-product-right.html">Dresses</a></li>
                              <li><a href="shop-product-right.html">Blouses & Shirts</a></li>
                              <li><a href="shop-product-right.html">Hoodies & Sweatshirts</a></li>
                              <li><a href="shop-product-right.html">Women's Sets</a></li>
                           </ul>
                        </li>
                        <li class="menu-item-has-children">
                           <a href="#">Men's Fashion</a>
                           <ul class="dropdown">
                              <li><a href="shop-product-right.html">Jackets</a></li>
                              <li><a href="shop-product-right.html">Casual Faux Leather</a></li>
                              <li><a href="shop-product-right.html">Genuine Leather</a></li>
                           </ul>
                        </li>
                        <li class="menu-item-has-children">
                           <a href="#">Technology</a>
                           <ul class="dropdown">
                              <li><a href="shop-product-right.html">Gaming Laptops</a></li>
                              <li><a href="shop-product-right.html">Ultraslim Laptops</a></li>
                              <li><a href="shop-product-right.html">Tablets</a></li>
                              <li><a href="shop-product-right.html">Laptop Accessories</a></li>
                              <li><a href="shop-product-right.html">Tablet Accessories</a></li>
                           </ul>
                        </li>
                     </ul>
                  </li>
                  <li class="menu-item-has-children">
                     <a href="/blog">Blog</a>
                  </li>
                  <li class="menu-item-has-children">
                     <a href="/about">About Us</a>
                  </li>
                  <li class="menu-item-has-children">
                     <a href="#">Language</a>
                     <ul class="dropdown">
                        <li><a href="#">English</a></li>
                        <li><a href="#">French</a></li>
                        <li><a href="#">German</a></li>
                        <li><a href="#">Spanish</a></li>
                     </ul>
                  </li>
               </ul>
            </nav>
            <!-- mobile menu end -->
         </div>
         
         <div class="mobile-header-info-wrap">
            <div class="single-mobile-header-info">
               <a href="/contact"><i class="fi-rs-marker"></i> Contact Us </a>
            </div>
            <div class="single-mobile-header-info">
               @auth
                  <a href="{{url('my-account')}}"><i class="fi-rs-user"></i>{{Auth::user()->name}}</a>
               @else
                  <a href="/login"><i class="fi-rs-user"></i>Log In / Sign Up </a>
               @endif
            </div>
            <div class="single-mobile-header-info">
               <a href="tel: {{$settings->phone}}"><i class="fi-rs-headphones"></i>{{$settings->phone}}</a>
            </div>
         </div>
         <div class="mobile-social-icon mb-50">
            <h6 class="mb-15">Follow Us</h6>
            <a href="{{$settings->facebook}}"><img src="{{asset('assets/imgs/theme/icons/icon-facebook-white.svg')}}" alt="" /></a>
            <a href="{{$settings->twitter}}"><img src="{{asset('assets/imgs/theme/icons/icon-twitter-white.svg')}}" alt="" /></a>
            <a href="{{$settings->instagram}}"><img src="{{asset('assets/imgs/theme/icons/icon-instagram-white.svg')}}" alt="" /></a>
            <a href="{{$settings->facebook}}"><img src="{{asset('assets/imgs/theme/icons/icon-pinterest-white.svg')}}" alt="" /></a>
            <a href="{{$settings->facebook}}"><img src="{{asset('assets/imgs/theme/icons/icon-youtube-white.svg')}}" alt="" /></a>
         </div>
         <div class="site-copyright">Copyright {{date('Y')}} © Nest Crafts. All rights reserved.</div>
      </div>
   </div>
</div>
<!--End header-->
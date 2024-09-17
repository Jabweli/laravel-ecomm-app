<div>

   <main class="main">
      <div class="container mb-30">
         <div class="row flex-row-reverse">
            <div class="col-lg-4-5">
               <!--End hero-->
               <section class="home-slider position-relative mb-30" wire:ignore>
                  <div class="home-slide-cover mt-30">
                     <div class="hero-slider-1 style-4 dot-style-1 dot-style-1-position-1">
                        <div class="single-hero-slider single-animation-wrap"
                           style="background-image: url(assets/imgs/slider/slider-1.png)">
                           <div class="slider-content">
                              <h1 class="display-2 mb-40">
                                 Don’t miss amazing<br />
                                 grocery deals
                              </h1>
                              <p class="mb-65">Sign up for the daily newsletter</p>
                              <form class="form-subcriber d-flex" wire:submit.prevent="newsletter">
                                 <input type="email" placeholder="Your emaill address" wire:model.defer="email" />
                                 <button class="btn" type="submit">Subscribe</button>
                              </form>
                              @error('record') <span class="text-success">Please enter a valid email address</span> @enderror
                           </div>
                        </div>
                        <div class="single-hero-slider single-animation-wrap"
                           style="background-image: url(assets/imgs/slider/slider-2.png)">
                           <div class="slider-content">
                              <h1 class="display-2 mb-40">
                                 Fresh Vegetables<br />
                                 Big discount
                              </h1>
                              <p class="mb-65">Save up to 50% off on your first order</p>
                              
                              <form class="form-subcriber d-flex" wire:submit.prevent="newsletter">
                                 <input type="email" placeholder="Your emaill address" wire:model.defer="email"/>
                                 <button class="btn" type="submit">Subscribe</button>
                              </form>
                              @error('record') <span class="text-success">Please enter a valid email address</span> @enderror
                           </div>
                        </div>
                     </div>
                     <div class="slider-arrow hero-slider-1-arrow"></div>
                  </div>
               </section>
               

               <!--Products Tabs-->  
               <section class="product-tabs section-padding position-relative">

                  <div class="module-header with-border">
                     <h3 class="entry-title">Featured Products</h3>
                     <nav class="module-tab-links style-1">
                        {{-- <ul class="nav nav-tabs">
                           <li class="tab-item active">
                              <a class="tab-link" data-bs-toggle="tab" href="#tab-one" id="24">Auto Safety &amp;Security</a>
                           </li>
                           <li class="tab-item ">
                              <a class="tab-link" data-bs-toggle="tab" href="#tab-two" id="32">Interior Accessories</a>
                           </li>
                           <li class="tab-item ">
                              <a class="tab-link" data-bs-toggle="tab" href="#tab-three" id="70">Motor Oils</a>
                           </li>
                           <li class="tab-item ">
                              <a class="tab-link" href="#tab-four" id="49">Tires &amp;Wheels</a>
                           </li>
                        </ul> --}}
                     </nav>
                     <a class="tab-btn" href="/shop">
                        View All <i class="klbth-icon-arrow-right-long"></i>
                     </a>
                  </div>


                  <!--ntab content-->
                  <div class="tab-content" id="myTabContent" wire:ignore>

                     <!-- tab one -->
                     <div class="tab-pane fade show active" id="tab-one" role="tabpanel" aria-labelledby="tab-one">
                        <div class="carausel-4-columns-cover arrow-center position-relative">
                           <div class="slider-arrow slider-arrow-2 carausel-4-columns-arrow"
                              id="carausel-4-columns-arrows"></div>

                           <div class="carausel-4-columns carausel-arrow-center" id="carausel-4-columns">
                              @foreach ($featured_products as $product)                                
                                 <div class="product">
                                    <div class="product-wrapper">
                                       <div class="product-content">
                                          <div class="thumbnail-wrapper entry-media">
                                             <div class="product-badges">
                                                @if ($product->badge == 'Discount')
                                                   <span class="badge hot">{{$product->discount}} %</span>
                                                @else
                                                   <span class="badge {{strtolower($product->badge)}}">
                                                      {{$product->badge}}
                                                   </span>
                                                @endif
                                             </div>
                                             <a class="product-thumbnail" href="{{url('product/'.$product->slug)}}">
                                                <img decoding="async" src="{{asset('storage/products/'.$product->image)}}"
                                                   @if ($product->productImages->count() > 0)
                                                      data-hover-slides="
                                                         @forelse ($product->productImages as $item)                               
                                                            {{asset('storage/pdtgallery/'.$item->image)}} @if(!$loop->last) , @endif
                                                         @empty
                                                         @endforelse
                                                      " 
                                                      data-options='{"touch": "end", "preloadImages": true }' alt="{{$product->name}}"
                                                   @endif 
                                                   >
                                             </a>
                                             <div class="product-buttons">
                                                <div wire:click="addToWishList({{$product->id}}, '{{$product->name}}', {{$product->sale_price}})">
                                                   <i class="klbth-icon-heart-empty"></i>
                                                </div>
                                             </div>
                                          </div>
                                          <div class="content-wrapper">
                                             <h3 class="product-title">
                                                <a href="{{url('product/'.$product->slug)}}">
                                                   {{$product->name}}
                                                </a>
                                             </h3>
                                             <div class="product-rate-cover">
                                                <div class="product-rate d-inline-block">
                                                   <div class="product-rating" style="width: 90%"></div>
                                                </div>
                                                <span class="font-small ml-5 text-muted"> 1 review</span>
                                             </div>
                                             <div class="product-cart-form">
                                                <span class="price d-flex">
                                                   <del aria-hidden="true">
                                                      <span class="amount">
                                                         <bdi><span>&#36;</span>{{$product->regular_price}}</bdi>
                                                      </span>
                                                   </del>
                                                   <ins>
                                                      <span class="amount">
                                                         <bdi><span>&#36;</span> {{$product->sale_price}}</bdi>
                                                      </span>
                                                   </ins>
                                                </span>
                                                <a href="#" class="button" wire:click.prevent="store({{$product->id}}, '{{$product->name}}', {{$product->sale_price}})">
                                                   <i class="fi-rs-shopping-bag-add"></i>
                                                </a>
                                             </div>
                                             <div class="product-stock in-stock">
                                                <i class="klbth-icon-ecommerce-package-ready"></i>
                                                <span>{{$product->in_stock == 'Instock' ? 'In Stock':'Out of Stock'}}</span>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div> 
                              @endforeach 
                           </div>
                        </div>
                     </div>
                  </div>

               </section>
                           
               
               <!--banners-->
               <section class="banners mt-30">
                  <div class="row">
                     <div class="col-lg-4 col-md-6">
                        <div class="banner-img">
                           <img src="assets/imgs/banner/banner-1.png" alt="" />
                           <div class="banner-text">
                              <h4>
                                 Everyday Fresh & <br />Clean with Our<br />
                                 Products
                              </h4>
                              <a href="shop-grid-right.html" class="btn btn-xs">
                                 Shop Now <i class="fi-rs-arrow-small-right"></i>
                              </a>
                           </div>
                        </div>
                     </div>
                     <div class="col-lg-4 col-md-6">
                        <div class="banner-img">
                           <img src="assets/imgs/banner/banner-2.png" alt="" />
                           <div class="banner-text">
                              <h4>
                                 Make your Breakfast<br />
                                 Healthy and Easy
                              </h4>
                              <a href="shop-grid-right.html" class="btn btn-xs">
                                 Shop Now <i class="fi-rs-arrow-small-right"></i>
                              </a>
                           </div>
                        </div>
                     </div>
                     <div class="col-lg-4 d-md-none d-lg-flex">
                        <div class="banner-img mb-sm-0">
                           <img src="assets/imgs/banner/banner-3.png" alt="" />
                           <div class="banner-text">
                              <h4>The best Organic <br />Products Online For You</h4>
                              <a href="shop-grid-right.html" class="btn btn-xs">
                                 Shop Now <i class="fi-rs-arrow-small-right"></i>
                              </a>
                           </div>
                        </div>
                     </div>
                  </div>
               </section>
               
            </div>

            <!-- left side bar -->
            <div class="col-lg-1-5 primary-sidebar sticky-sidebar pt-30">
               <div class="row">
                  <div class="col-md-6 col-lg-12">
                     <div class="category-widget widget-category-2 mb-30">
                        <h5 class="section-title style-1 mb-20">Category</h5>
                        <ul>
                           @foreach ($categories as $category)
                              <li>
                                 <a href="{{url('products/category/'.$category->slug)}}"> 
                                    <img src="{{asset('storage/categories/'.$category->image)}}" alt="{{$category->name}}" style="border-radius: 5px"/>
                                    {{$category->name}}
                                 </a>
                                 <span class="count">{{$category->products->count()}}</span>
                              </li>
                           @endforeach
                        </ul>
                     </div>
                  </div>

                  <div class="col-md-6 col-lg-12">
                     <!-- Fillter By Price -->
                     <div class="sidebar-widget price_range range mb-30">
                        <h5 class="section-title style-1 mb-30">Fill by price</h5>
                        <div class="price-filter">
                           <div class="price-filter-inner">
                              <div id="slider-range" class="mb-20"></div>
                              <div class="d-flex justify-content-between">
                                 <div class="caption">From: <strong id="slider-range-value1" class="text-brand"></strong>
                                 </div>
                                 <div class="caption">To: <strong id="slider-range-value2" class="text-brand"></strong></div>
                              </div>
                           </div>
                        </div>
                        <div class="list-group">
                           <div class="list-group-item mb-10 mt-10">
                              <label class="fw-900">Color</label>
                              <div class="custome-checkbox">
                                 <input class="form-check-input" type="checkbox" name="checkbox" id="exampleCheckbox1"
                                    value="" />
                                 <label class="form-check-label" for="exampleCheckbox1"><span>Red (56)</span></label>
                                 <br />
                                 <input class="form-check-input" type="checkbox" name="checkbox" id="exampleCheckbox2"
                                    value="" />
                                 <label class="form-check-label" for="exampleCheckbox2"><span>Green (78)</span></label>
                                 <br />
                                 <input class="form-check-input" type="checkbox" name="checkbox" id="exampleCheckbox3"
                                    value="" />
                                 <label class="form-check-label" for="exampleCheckbox3"><span>Blue (54)</span></label>
                              </div>
                           </div>
                        </div>
                        <a href="shop-grid-right.html" class="btn btn-sm btn-default"><i class="fi-rs-filter mr-5"></i>
                           Fillter</a>
                     </div>
                  </div>
               </div>
               

               
               <div class="banner-img wow fadeIn mb-lg-0 animated d-lg-block d-none">
                  <img src="assets/imgs/banner/banner-11.png" alt="" />
                  <div class="banner-text">
                     <span>Oganic</span>
                     <h4>
                        Save 17% <br />
                        on <span class="text-brand">Oganic</span><br />
                        Juice
                     </h4>
                  </div>
               </div>
            </div>
         </div>
      </div>

      <!--Deals-->
      <section class="section-padding pb-5">
         <div class="container">
            <div class="module-header with-border">
               <h3 class="entry-titledd">Deals Of The Day</h3>
               <a class="tab-btn d-none d-lg-block" href="/shop">
                  View All <i class="klbth-icon-arrow-right-long"></i>
               </a>
            </div>
            <div class="row">
               <div class="col-xl-3 col-lg-4 col-md-6">
                  <div class="product-cart-wrap style-2">
                     <div class="product-img-action-wrap">
                        <div class="product-img">
                           <a href="shop-product-right.html">
                              <img src="assets/imgs/banner/banner-5.png" alt="" />
                           </a>
                        </div>
                     </div>
                     <div class="product-content-wrap">
                        <div class="deals-countdown-wrap">
                           <div class="deals-countdown" data-countdown="2025/03/25 00:00:00"></div>
                        </div>
                        <div class="deals-content">
                           <h2><a href="shop-product-right.html">Seeds of Change Organic Quinoa, Brown</a></h2>
                           <div class="product-rate-cover">
                              <div class="product-rate d-inline-block">
                                 <div class="product-rating" style="width: 90%"></div>
                              </div>
                              <span class="font-small ml-5 text-muted"> (4.0)</span>
                           </div>
                           <div>
                              <span class="font-small text-muted">By <a
                                    href="vendor-details-1.html">NestFood</a></span>
                           </div>
                           <div class="product-card-bottom">
                              <div class="product-price">
                                 <span>$32.85</span>
                                 <span class="old-price">$33.8</span>
                              </div>
                              <div class="add-cart">
                                 <a class="add" href="shop-cart.html"><i class="fi-rs-shopping-cart mr-5"></i>Add
                                 </a>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="col-xl-3 col-lg-4 col-md-6">
                  <div class="product-cart-wrap style-2">
                     <div class="product-img-action-wrap">
                        <div class="product-img">
                           <a href="shop-product-right.html">
                              <img src="assets/imgs/banner/banner-6.png" alt="" />
                           </a>
                        </div>
                     </div>
                     <div class="product-content-wrap">
                        <div class="deals-countdown-wrap">
                           <div class="deals-countdown" data-countdown="2026/04/25 00:00:00"></div>
                        </div>
                        <div class="deals-content">
                           <h2><a href="shop-product-right.html">Perdue Simply Smart Organics Gluten</a></h2>
                           <div class="product-rate-cover">
                              <div class="product-rate d-inline-block">
                                 <div class="product-rating" style="width: 90%"></div>
                              </div>
                              <span class="font-small ml-5 text-muted"> (4.0)</span>
                           </div>
                           <div>
                              <span class="font-small text-muted">By <a href="vendor-details-1.html">Old El
                                    Paso</a></span>
                           </div>
                           <div class="product-card-bottom">
                              <div class="product-price">
                                 <span>$24.85</span>
                                 <span class="old-price">$26.8</span>
                              </div>
                              <div class="add-cart">
                                 <a class="add" href="shop-cart.html"><i class="fi-rs-shopping-cart mr-5"></i>Add
                                 </a>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="col-xl-3 col-lg-4 col-md-6 d-none d-lg-block">
                  <div class="product-cart-wrap style-2">
                     <div class="product-img-action-wrap">
                        <div class="product-img">
                           <a href="shop-product-right.html">
                              <img src="assets/imgs/banner/banner-7.png" alt="" />
                           </a>
                        </div>
                     </div>
                     <div class="product-content-wrap">
                        <div class="deals-countdown-wrap">
                           <div class="deals-countdown" data-countdown="2027/03/25 00:00:00"></div>
                        </div>
                        <div class="deals-content">
                           <h2><a href="shop-product-right.html">Signature Wood-Fired Mushroom</a></h2>
                           <div class="product-rate-cover">
                              <div class="product-rate d-inline-block">
                                 <div class="product-rating" style="width: 80%"></div>
                              </div>
                              <span class="font-small ml-5 text-muted"> (3.0)</span>
                           </div>
                           <div>
                              <span class="font-small text-muted">By <a
                                    href="vendor-details-1.html">Progresso</a></span>
                           </div>
                           <div class="product-card-bottom">
                              <div class="product-price">
                                 <span>$12.85</span>
                                 <span class="old-price">$13.8</span>
                              </div>
                              <div class="add-cart">
                                 <a class="add" href="shop-cart.html"><i class="fi-rs-shopping-cart mr-5"></i>Add
                                 </a>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="col-xl-3 col-lg-4 col-md-6 d-none d-xl-block">
                  <div class="product-cart-wrap style-2">
                     <div class="product-img-action-wrap">
                        <div class="product-img">
                           <a href="shop-product-right.html">
                              <img src="assets/imgs/banner/banner-8.png" alt="" />
                           </a>
                        </div>
                     </div>
                     <div class="product-content-wrap">
                        <div class="deals-countdown-wrap">
                           <div class="deals-countdown" data-countdown="2025/02/25 00:00:00"></div>
                        </div>
                        <div class="deals-content">
                           <h2><a href="shop-product-right.html">Simply Lemonade with Raspberry Juice</a></h2>
                           <div class="product-rate-cover">
                              <div class="product-rate d-inline-block">
                                 <div class="product-rating" style="width: 80%"></div>
                              </div>
                              <span class="font-small ml-5 text-muted"> (3.0)</span>
                           </div>
                           <div>
                              <span class="font-small text-muted">By <a
                                    href="vendor-details-1.html">Yoplait</a></span>
                           </div>
                           <div class="product-card-bottom">
                              <div class="product-price">
                                 <span>$15.85</span>
                                 <span class="old-price">$16.8</span>
                              </div>
                              <div class="add-cart">
                                 <a class="add" href="shop-cart.html"><i class="fi-rs-shopping-cart mr-5"></i>Add
                                 </a>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>

      <!--category slider-->
      <section class="popular-categories section-padding">
         <div class="container">
            <div class="section-title">
               <div class="title">
                  <h3>Shop by Categories</h3>
               </div>
               <div class="slider-arrow slider-arrow-2 flex-right carausel-8-columns-arrow"
                  id="carausel-8-columns-arrows"></div>
            </div>
            <div class="carausel-8-columns-cover position-relative" wire:ignore>
               <div class="carausel-8-columns" id="carausel-8-columns">
                  @foreach ($categories as $category)
                     @if ($category->products->count() > 0)
                        <div class="card-1">
                           <figure class="img-hover-scale overflow-hidden">
                              <a href="{{url('products/category/'.$category->slug)}}">
                                 <img src="{{asset('storage/categories/'.$category->image)}}" alt="{{$category->image}}" />
                              </a>
                           </figure>
                           <h6>
                              <a href="{{url('products/category/'.$category->slug)}}">
                                 {{$category->name}}
                              </a>
                           </h6>
                        </div>
                     @endif
                  @endforeach
               </div>
            </div>
         </div>
      </section>


      <!-- best deals -->
      <section class="section-padding pb-5">
         <div class="container">
            <div class="section-title wow animate__animated animate__fadeIn">
               <h3>Daily Best Sells</h3>
            </div>
            <div class="row">
               <div class="col-lg-3 d-none d-lg-flex wow animate__animated animate__fadeIn">
                  <div class="banner-img style-2" style="height: 97%">
                     <div class="banner-text">
                        <h2 class="mb-100">Bring nature into your home</h2>
                        <a href="/shop" class="btn btn-xs">
                           Shop Now <i class="fi-rs-arrow-small-right"></i>
                        </a>
                     </div>
                  </div>
               </div>
               <div class="col-lg-9 col-md-12 wow animate__animated animate__fadeIn" data-wow-delay=".4s">
                  <div class="product-flex-wrapper">

                     @foreach ($popular_products as $pdt)
                        <div class="product product-type-1 mb-20">
                           <div class="product-wrapper">
                              <div class="product-content">
                                 <div class="thumbnail-wrapper entry-media">
                                    <div class="product-badges">
                                       @if ($pdt->badge == 'Discount')
                                          <span class="badge hot">{{$pdt->discount}} %</span>
                                       @else
                                          <span class="badge {{strtolower($pdt->badge)}}">
                                             {{$pdt->badge}}
                                          </span>
                                       @endif
                                    </div>
                                    <a class="product-thumbnail" href="{{url('product/'.$pdt->slug)}}">
                                       <img decoding="async" src="{{asset('storage/products/'.$pdt->image)}}"
                                       @if ($pdt->productImages->count() > 0)
                                          data-hover-slides="
                                             @forelse ($pdt->productImages as $item)                               
                                                {{asset('storage/pdtgallery/'.$item->image)}} @if(!$loop->last) , @endif
                                             @empty
                                             @endforelse
                                          " 
                                          data-options='{"touch": "end", "preloadImages": true }' alt="{{$pdt->name}}"
                                       @endif 
                                       >
                                    </a>
                                    <div class="product-buttons">
                                       <div wire:click="addToWishlist({{$pdt->id}}, '{{$pdt->name}}', {{$pdt->sale_price}})">
                                          <i class="klbth-icon-heart-empty"></i>
                                       </div>
                                       <a class="detail-bnt">
                                          <i class="fi-rs-eye"></i>
                                       </a>
                                    </div>
                                 </div>
                                 <div class="content-wrapper">
                                    <h3 class="product-title">
                                       <a href="{{url('product/'.$pdt->slug)}}">{{$pdt->name}}</a>
                                    </h3>
                                    <div class="product-rate-cover">
                                       <div class="product-rate d-inline-block">
                                          <div class="product-rating" style="width: 90%"></div>
                                       </div>
                                       <span class="font-small ml-5 text-muted"> 1 review</span>
                                    </div>
                                    <span class="price">
                                       <del aria-hidden="true">
                                          <span class="amount">
                                             <bdi>
                                                <span class="">&#36;</span>
                                                {{$pdt->regular_price}}
                                             </bdi>
                                          </span>
                                       </del>
                                       <ins>
                                          <span class="amount">
                                             <bdi>
                                                <span class="">&#36;</span>
                                                {{$pdt->sale_price}}
                                             </bdi>
                                          </span>
                                       </ins>
                                    </span>
                                    <div class="product-stock in-stock">
                                       <i class="klbth-icon-ecommerce-package-ready"></i>
                                       <span>{{$pdt->in_stock == 'Instock' ? 'In Stock':'Out of Stock'}}</span>
                                    </div>
                                 </div>
                              </div>
                              <div class="product-footer">
                                 <div class="product-footer-inner">
                                    <a href="#" class="primary  button product_type_simple add_to_cart_button ajax_add_to_cart" 
                                    wire:click.prevent="store({{$pdt->id}}, '{{$pdt->name}}', {{$pdt->sale_price}})">
                                       Add to cart <i class="klbth-icon-shopping-bag"></i>
                                    </a>
                                 </div>
                              </div>
                           </div>
                           <div class="product-content-fade"></div>
                        </div>
                     @endforeach
                  </div>

               </div>
            </div>
         </div>
      </section>

      <section class="featured section-padding">
         <div class="container">
            <div class="row">
               <div class="col-lg-3 col-md-6 col-12 col-sm-6 mb-md-4 mb-xl-0">
                  <div class="banner-left-icon d-flex align-items-center wow fadeIn animated">
                     <div class="banner-icon">
                        <img src="assets/imgs/theme/icons/icon-1.svg" alt="" />
                     </div>
                     <div class="banner-text">
                        <h3 class="icon-box-title">Best prices & offers</h3>
                        <p>Orders $50 or more</p>
                     </div>
                  </div>
               </div>
               <div class="col-lg-3 col-md-6 col-12 col-sm-6">
                  <div class="banner-left-icon d-flex align-items-center wow fadeIn animated">
                     <div class="banner-icon">
                        <img src="assets/imgs/theme/icons/icon-2.svg" alt="" />
                     </div>
                     <div class="banner-text">
                        <h3 class="icon-box-title">Free delivery</h3>
                        <p>24/7 amazing services</p>
                     </div>
                  </div>
               </div>
               <div class="col-lg-3 col-md-6 col-12 col-sm-6">
                  <div class="banner-left-icon d-flex align-items-center wow fadeIn animated">
                     <div class="banner-icon">
                        <img src="assets/imgs/theme/icons/icon-3.svg" alt="" />
                     </div>
                     <div class="banner-text">
                        <h3 class="icon-box-title">Great daily deal</h3>
                        <p>When you sign up</p>
                     </div>
                  </div>
               </div>
               <div class="col-lg-3 col-md-6 col-12 col-sm-6">
                  <div class="banner-left-icon d-flex align-items-center wow fadeIn animated">
                     <div class="banner-icon">
                        <img src="assets/imgs/theme/icons/icon-5.svg" alt="" />
                     </div>
                     <div class="banner-text">
                        <h3 class="icon-box-title">Easy returns</h3>
                        <p>Within 30 days</p>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
      
   </main>





<!-- Quick view modal-->
<div wire:ignore.self class="modal fade custom-modal" id="quickViewModal" tabindex="-1" aria-labelledby="quickViewModalLabel" aria-hidden="true">
   <div class="modal-dialog modal-lg">
      <div class="modal-content">
         <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
         <div class="modal-body">
            <div class="row">
               <div class="col-md-6 col-sm-12 col-xs-12">
                  <div class="detail-gallery">
                     <span class="zoom-icon"><i class="fi-rs-search"></i></span>
                     <!-- MAIN SLIDES -->
                     <div class="product-image-slider">
                        @if ($quick_pdt)                                 
                           <figure class="border-radius-10">
                              <img src="{{asset('storage/products/'.$quick_pdt->image)}}" alt="product image">
                           </figure>
                        @endif

                     </div>
                     <!-- THUMBNAILS -->
                     <div class="slider-nav-thumbnails pl-15 pr-15">
                        
                     </div>
                  </div>
                  <!-- End Gallery -->
                  <div class="social-icons single-share">
                     <ul class="text-grey-5 d-inline-block">
                        <li><strong class="mr-10">Share this:</strong></li>
                        <li class="social-facebook">
                           <a href="#">
                              <img src="{{asset('assets/imgs/theme/icons/icon-facebook.svg')}}" alt="facebook">
                           </a>
                        </li>
                        <li class="social-twitter"> 
                           <a href="#">
                              <img src="{{asset('assets/imgs/theme/icons/icon-twitter.svg')}}" alt="twitter">
                           </a>
                        </li>
                        <li class="social-instagram">
                           <a href="#">
                              <img src="{{asset('assets/imgs/theme/icons/icon-instagram.svg')}}" alt=instagram"">
                           </a>
                        </li>
                        <li class="social-linkedin">
                           <a href="#">
                              <img src="{{asset('assets/imgs/theme/icons/icon-pinterest.svg')}}" alt="pinterest">
                           </a>
                        </li>
                     </ul>
                  </div>
               </div>

               <div class="col-md-6 col-sm-12 col-xs-12">
                  <div class="detail-info">
                     <h3 class="title-detail mt-30">{{$quick_pdt->name ?? 'Product name'}}</h3>
                     <div class="product-detail-rating">
                        <div class="pro-details-brand">
                        @if ($quick_pdt)
                           <span> Category: <a href="{{url('products/category/'.$quick_pdt->category->slug)}}">{{$quick_pdt->category->name ?? 'N/A'}}</a></span>
                        @endif
                        </div>
                        <div class="product-rate-cover text-end">
                           <div class="product-rate d-inline-block">
                              <div class="product-rating" style="width:90%">
                              </div>
                           </div>
                           <span class="font-small ml-5 text-muted"> (25 reviews)</span>
                        </div>
                     </div>
                     <div class="clearfix product-price-cover">
                        <div class="product-price primary-color float-left">
                           <ins><span class="text-brand">${{$quick_pdt->sale_price ?? 'N/A'}}</span></ins>
                           <ins><span class="old-price font-md ml-15">${{$quick_pdt->regular_price ?? 'N/A'}}</span></ins>
                           <span class="save-price  font-md color3 ml-15">{{$quick_pdt->discount ?? 'N/A'}}% Off</span>
                        </div>
                     </div>
                     <div class="bt-1 border-color-1 mt-15 mb-15"></div>
                     <div class="short-desc mb-30">
                        <p class="font-sm">{{$quick_pdt->short_desc ?? 'N/A'}}</p>
                     </div>

                     <div class="bt-1 border-color-1 mt-30 mb-30"></div>
                     <div class="detail-extralink">
                        <div class="detail-qty border radius">
                           <a href="#" class="qty-down"><i class="fi-rs-angle-small-down"></i></a>
                           <span class="qty-val">1</span>
                           <a href="#" class="qty-up"><i class="fi-rs-angle-small-up"></i></a>
                        </div>
                        <div class="product-extra-link2">
                           <button type="submit" class="button button-add-to-cart">Add to cart</button>
                           <a aria-label="Add To Wishlist" class="action-btn hover-up" href="wishlist.php"><i class="fi-rs-heart"></i></a>
                           <a aria-label="Compare" class="action-btn hover-up" href="compare.php"><i class="fi-rs-shuffle"></i></a>
                        </div>
                     </div>
                     <ul class="product-meta font-xs color-grey mt-5">
                        <li class="mb-5">SKU: <a href="#">{{$quick_pdt->sku ?? 'N/A'}}</a></li>
                        <li>
                        Availability:
                        <span class="in-stock text-success ml-5">
                           @if ($quick_pdt)
                              {{
                                 $quick_pdt->in_stock == 'Out of stock' ? 'Out of stock' : $quick_pdt->qtty." "."Items in stock"
                              }}
                           @endif
                           
                        </span>
                        </li>
                     </ul>
                  </div>
                  <!-- Detail Info -->
               </div>
            </div>
         </div>
      </div>
   </div>
</div>

   
</div>

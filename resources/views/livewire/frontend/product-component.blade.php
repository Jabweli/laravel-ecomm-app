<div>
   {{-- Nothing in the world is as soft and yielding as water. --}}

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

                              @forelse ($quick_pdt->productImages as $item)
                              <figure class="border-radius-10">
                                 <img src="{{asset('storage/pdtgallery/'.$item->image)}}" alt="{{$item->image}}">
                              </figure>                                   
                              @empty
                                 
                              @endforelse
                           @endif

                        </div>
                        <!-- THUMBNAILS -->
                        <div class="slider-nav-thumbnails pl-15 pr-15">

                           {{-- @if ($quick_pdt)                                 
                              <div>
                                 <img src="{{asset('storage/products/'.$quick_pdt->image )}}" alt="product image">
                              </div>

                              @forelse ($quick_pdt->productImages as $item)
                                 <div>
                                    <img src="{{asset('storage/pdtgallery/'.$item->image)}}" alt="product image">
                                 </div>                                   
                              @empty                                  
                              @endforelse
                           @endif --}}
                           
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

<main class="main">
   <div class="page-header breadcrumb-wrap">
      <div class="container">
         <div class="breadcrumb">
            <a href="/" rel="nofollow">Home</a>
            <span></span> {{$product->category->name}}
            <span></span> {{$product->name}}
         </div>
      </div>
   </div>

   <section class="mt-50 mb-50">
      <div class="container">
         <div class="row">
            <div class="col-xl-11 col-lg-12 m-auto">
               <div class="row">
                  <div class="col-lg-9">
                     <div class="product-detail accordion-detail">
                        <div class="row mb-50">
                           <div class="col-md-6 col-sm-12 col-xs-12">
                              <div class="detail-gallery" wire:ignore>
                                 <span class="zoom-icon"><i class="fi-rs-search"></i></span>
                                 <!-- MAIN SLIDES -->
                                 <div class="product-image-slider">
                                    <figure class="border-radius-10">
                                          <img src="{{asset('storage/products/'.$product->image)}}" alt="product image">
                                    </figure>

                                    @forelse ($product->productImages as $item)
                                          
                                       <figure class="border-radius-10">
                                          <img src="{{asset('storage/pdtgallery/'.$item->image)}}" alt="product image">
                                       </figure>

                                    @empty
                                          
                                    @endforelse
                                    
                                 </div>
                                 <!-- THUMBNAILS -->
                                 <div class="slider-nav-thumbnails pl-15 pr-15">
                                    <div>
                                       <img src="{{asset('storage/products/'.$product->image)}}" alt="thumb nail">
                                    </div>

                                    @forelse ($product->productImages as $item)
                                          
                                       <figure class="border-radius-10">
                                          <div>
                                             <img src="{{asset('storage/pdtgallery/'.$item->image)}}" alt="thumb nail">
                                          </div>
                                       </figure>

                                    @empty
                                          
                                    @endforelse
                                    
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
                                 <span class="stock-status out-stock"> {{$product->badge}} </span>
                                 <h2 class="title-detail">{{$product->name}}</h2>
                                 <div class="product-detail-rating">
                                    <div class="product-rate-cover text-end">
                                       <div class="product-rate d-inline-block">
                                          <div class="product-rating" style="width: 90%"></div>
                                       </div>
                                       <span class="font-small ml-5 text-muted"> (32 reviews)</span>
                                    </div>
                                 </div>
                                 <div class="clearfix product-price-cover">
                                    <div class="product-price primary-color float-left">
                                       <span class="current-price text-brand">${{$product->sale_price}}</span>
                                       <span>
                                          <span class="save-price font-md color3 ml-15">{{$product->discount}}% Off</span>
                                          <span class="old-price font-md ml-15">${{$product->regular_price}}</span>
                                       </span>
                                    </div>
                                 </div>
                        
                                 <div class="short-desc mb-30">
                                    <p>{{$product->short_desc}}</p>
                                 </div>
                                 <div class="product_sort_info font-xs mb-10">
                                    <ul>
                                       <li class="mb-10"><i class="fi-rs-refresh mr-5"></i> 30 Day Return Policy</li>
                                       <li><i class="fi-rs-credit-card mr-5"></i> Cash on Delivery available</li>
                                    </ul>
                                 </div>

                                 <div class="bt-1 border-color-1 mt-10dd mb-30"></div>
                                 @if ($product->in_stock == 'Instock')
                                    <div class="detail-extralink">
                                       <div class="detail-qty border radius">
                                          <a href="#" class="qty-down" id="qty-down"><i class="fas fa-minus"></i></a>
                                          <span class="qty-val">{{$qty}}</span>
                                          <a href="#" class="qty-up" id="qty-up"><i class="fas fa-plus"></i></a>
                                       </div>
                                       
                                       <div class="product-extra-link2">
                                          <button type="submit" class="button button-add-to-cart" wire:click="store({{$product->id}}, '{{$product->name}}', {{$product->sale_price}})">
                                             Add to cart
                                          </button>
                                          @php
                                             $witems = Cart::instance('wishlist')->content()->pluck('id');
                                          @endphp

                                          @if ($witems->contains($product->id))
                                             <button type="submit" class="button button-add-to-cart px-3">
                                                <i class="fi-rs-heart" style="font-size: 17pxddd"></i>
                                             </button>
                                          @else
                                             <a aria-label="Add To Wishlist" class="action-btn hover-up" href="#" 
                                             wire:click.prevent="addToWishList({{$product->id}}, '{{$product->name}}', {{$product->sale_price}})">
                                                <i class="fi-rs-heart"></i>
                                             </a>
                                          @endif
                                       </div>
                                    </div>
                                 @else 
                                    <h6 class="text-danger">Sorry! This item is currently out of stock</h6>
                                 @endif
                                 <ul class="product-meta font-xs color-grey mt-10">
                                    <li class="mb-5">SKU: <a href="#">{{$product->sku ?? 'N/A'}}</a></li>
                                    <li>
                                       Availability:
                                       <span class="in-stock text-success ml-5">
                                          {{
                                             $product->in_stock == 'Out of stock' ? 'Out of stock' : $product->qtty." "."Items in stock"
                                          }}
                                          
                                       </span>
                                    </li>
                                 </ul>
                              </div>
                              <!-- Detail Info -->
                           </div>
                        </div>
                        <div class="tab-style3">
                           <ul class="nav nav-tabs text-uppercase">
                              <li class="nav-item">
                                 <a class="nav-link active" id="Description-tab" data-bs-toggle="tab" href="#Description">Description</a>
                              </li>
                              <li class="nav-item">
                                 <a class="nav-link" id="Additional-info-tab" data-bs-toggle="tab" href="#Additional-info">Additional info</a>
                              </li>
                              <li class="nav-item">
                                 <a class="nav-link" id="Reviews-tab" data-bs-toggle="tab" href="#Reviews">Reviews (3)</a>
                              </li>
                           </ul>
                           <div class="tab-content shop_info_tabdd entry-main-content">
                              <!--description-->
                              <div class="tab-pane fade show active" id="Description">
                                 {!! $product->long_desc !!}
                              </div>
                              <!--additional info-->
                              <div class="tab-pane fade" id="Additional-info">
                                 {!! $product->additional_info !!}
                              </div>
                              <!--reviews-->
                              <div class="tab-pane fade" id="Reviews">
                                 <!--Comments-->
                                 <div class="comments-area">
                                    <div class="row">
                                       <div class="col-lg-8">
                                          <h4 class="mb-30">Customer questions & answers</h4>
                                          <div class="comment-list">
                                             <div class="single-comment justify-content-between d-flex">
                                                <div class="user justify-content-between d-flex">
                                                   <div class="thumb text-center">
                                                      <img src="assets/imgs/page/avatar-6.jpg" alt="">
                                                      <h6><a href="#">Jacky Chan</a></h6>
                                                      <p class="font-xxs">Since 2012</p>
                                                   </div>
                                                   <div class="desc">
                                                      <div class="product-rate d-inline-block">
                                                         <div class="product-rating" style="width:90%">
                                                         </div>
                                                      </div>
                                                      <p>Thank you very fast shipping from Poland only 3days.</p>
                                                      <div class="d-flex justify-content-between">
                                                         <div class="d-flex align-items-center">
                                                            <p class="font-xs mr-30">December 4, 2020 at 3:12 pm </p>
                                                            <a href="#" class="text-brand btn-reply">Reply <i class="fi-rs-arrow-right"></i> </a>
                                                         </div>
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                             <!--single-comment -->
                                             <div class="single-comment justify-content-between d-flex">
                                                <div class="user justify-content-between d-flex">
                                                   <div class="thumb text-center">
                                                      <img src="assets/imgs/page/avatar-7.jpg" alt="">
                                                      <h6><a href="#">Ana Rosie</a></h6>
                                                      <p class="font-xxs">Since 2008</p>
                                                   </div>
                                                   <div class="desc">
                                                      <div class="product-rate d-inline-block">
                                                         <div class="product-rating" style="width:90%">
                                                         </div>
                                                      </div>
                                                      <p>Great low price and works well.</p>
                                                      <div class="d-flex justify-content-between">
                                                         <div class="d-flex align-items-center">
                                                            <p class="font-xs mr-30">December 4, 2020 at 3:12 pm </p>
                                                            <a href="#" class="text-brand btn-reply">Reply <i class="fi-rs-arrow-right"></i> </a>
                                                         </div>
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                             <!--single-comment -->
                                             <div class="single-comment justify-content-between d-flex">
                                                <div class="user justify-content-between d-flex">
                                                   <div class="thumb text-center">
                                                      <img src="assets/imgs/page/avatar-8.jpg" alt="">
                                                      <h6><a href="#">Steven Keny</a></h6>
                                                      <p class="font-xxs">Since 2010</p>
                                                   </div>
                                                   <div class="desc">
                                                      <div class="product-rate d-inline-block">
                                                         <div class="product-rating" style="width:90%">
                                                         </div>
                                                      </div>
                                                      <p>Authentic and Beautiful, Love these way more than ever expected They are Great earphones</p>
                                                      <div class="d-flex justify-content-between">
                                                         <div class="d-flex align-items-center">
                                                            <p class="font-xs mr-30">December 4, 2020 at 3:12 pm </p>
                                                            <a href="#" class="text-brand btn-reply">Reply <i class="fi-rs-arrow-right"></i> </a>
                                                         </div>
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                             <!--single-comment -->
                                          </div>
                                       </div>
                                       <div class="col-lg-4">
                                          <h4 class="mb-30">Customer reviews</h4>
                                          <div class="d-flex mb-30">
                                             <div class="product-rate d-inline-block mr-15">
                                                   <div class="product-rating" style="width:90%">
                                                   </div>
                                             </div>
                                             <h6>4.8 out of 5</h6>
                                          </div>
                                          <div class="progress">
                                             <span>5 star</span>
                                             <div class="progress-bar" role="progressbar" style="width: 50%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">50%</div>
                                          </div>
                                          <div class="progress">
                                             <span>4 star</span>
                                             <div class="progress-bar" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25%</div>
                                          </div>
                                          <div class="progress">
                                             <span>3 star</span>
                                             <div class="progress-bar" role="progressbar" style="width: 45%;" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100">45%</div>
                                          </div>
                                          <div class="progress">
                                             <span>2 star</span>
                                             <div class="progress-bar" role="progressbar" style="width: 65%;" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100">65%</div>
                                          </div>
                                          <div class="progress mb-30">
                                             <span>1 star</span>
                                             <div class="progress-bar" role="progressbar" style="width: 85%;" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100">85%</div>
                                          </div>
                                          <a href="#" class="font-xs text-muted">How are ratings calculated?</a>
                                       </div>
                                    </div>
                                 </div>
                                 
                              </div>
                           </div>
                        </div>

                        <!-- related products -->
                        <div class="row mt-60">
                           <div class="col-12">
                              <h3 class="section-title style-1 mb-30">Related products</h3>
                           </div>
                           <div class="col-12 mb-30">
                              <div class="product-flex-wrapper">
                                 @forelse ($related_products as $pdt)                                   
                                 <div class="product product-type-1 mb-20 @if($loop->last) d-md-none d-lg-block @endif">
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
                                                {{-- <a class="detail-bnt">
                                                   <i class="fi-rs-eye"></i>
                                                </a> --}}
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
                                 @empty
                                    <h5>No related products found!</h5>
                                 @endforelse                                
                              </div>
                           </div>
                        </div>                            
                     </div>
                  </div>

                  <div class="col-lg-3 primary-sidebar sticky-sidebar">
                     <div class="row">
                        <div class="col-md-6 col-lg-12">
                           <div class="sidebar-widget widget-category-2 mb-30">
                              <h5 class="section-title style-1 mb-30">Category</h5>
                              <ul>
                                 @foreach ($categories as $category)
                                    @if ($category->products->count() > 0)
                                       <li>
                                          <a href="{{url('products/category/'.$category->slug)}}"> 
                                             <img src="{{asset('storage/categories/'.$category->image)}}" alt="{{$category->name}}" style="border-radius: 5px"/>
                                             {{$category->name}}
                                          </a>
                                          <span class="count">{{$category->products->count()}}</span>
                                       </li>
                                    @endif                             
                                 @endforeach
                              </ul>
                           </div>
                        </div>

                        <div class="col-md-6 col-lg-12">
                           <!-- Product sidebar Widget -->
                           <div class="sidebar-widget product-sidebar  mb-30 p-30 bg-grey border-radius-10">
                              <div class="widget-header position-relative mb-20 pb-10">
                                 <h5 class="widget-title mb-10">New products</h5>
                                 <div class="bt-1 border-color-1"></div>
                              </div>

                              @foreach ($new_products as $item)                          
                                 <div class="single-post clearfix">
                                    <div class="image">
                                       <a href="{{url('product/'.$item->slug)}}">
                                          <img src="{{asset('storage/products/'.$item->image)}}" alt="{{$item->image}}" style="border-radius: 5px">
                                       </a>
                                    </div>
                                    <div class="content pt-10">
                                       <h6>
                                          <a href="{{url('product/'.$item->slug)}}">
                                             {{strlen($item->name) > 10 ? substr($item->name, 0, 10).'...' : $item->name}}
                                          </a>
                                       </h6>
                                       <p class="price mb-0 mt-5">${{$item->sale_price}}</p>
                                       <div class="product-rate">
                                          <div class="product-rating" style="width:90%"></div>
                                       </div>
                                    </div>
                                 </div>
                              @endforeach
                              
                           </div>                             
                        </div>
                     </div>

                     
                  </div>
               </div>
            </div>
         </div>
      </div>
   </section>
</main>


</div>

<script>
   document.addEventListener('livewire:initialized', () => {
      @this.on('added-to-cart', (event) => {
         alert('Added to cart successfully!');
      });
   });
</script>

@push('scripts')
   <script>
      $('.detail-qty').each(function () {
         var qtyval = parseInt($(this).find('.qty-val').text(), 10);
         $('.qty-up').on('click', function (event) {
            event.preventDefault();
            qtyval = qtyval + 1;
            @this.set('qty', qtyval);
            $(this).prev().text(qtyval);
         });
         $('.qty-down').on('click', function (event) {
            event.preventDefault();
            qtyval = qtyval - 1;
            if (qtyval > 1) {
               @this.set('qty', qtyval);
               $(this).next().text(qtyval);
            } else {
               qtyval = 1;
               $(this).next().text(qtyval);
               @this.set('qty', qtyval);
            }
         });
      });
   </script>
@endpush

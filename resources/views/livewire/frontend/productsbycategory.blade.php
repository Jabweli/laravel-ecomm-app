<div>

   <main class="main">

      <div class="container mt-50 mb-30">
         <div class="row flex-row-reverse">
            <div class="col-lg-9 col-lg-4-5dd">
               <div class="shop-product-fillter">
                  <div class="totall-product">
                     <p>We found <strong class="text-brand">{{$products->count()}}</strong> items for you!</p>
                  </div>
                  <div class="sort-by-product-area">
                     <div class="sort-by-cover mr-10">
                        <div class="sort-by-product-wrap">
                           <div class="sort-by">
                              <span><i class="fi-rs-apps"></i>Show:</span>
                           </div>
                           <div class="sort-by-dropdown-wrap">
                              <span> {{$pageSize}} <i class="fi-rs-angle-small-down"></i></span>
                           </div>
                        </div>
                        <div class="sort-by-dropdown">
                           <ul>
                              <li><a class="{{$pageSize == 12 ? 'active':''}}" href="#" wire:click.prevent="changePageSize(12)">12</a></li>
                              <li><a class="{{$pageSize == 15 ? 'active':''}}" href="#" wire:click.prevent="changePageSize(15)">15</a></li>
                              <li><a class="{{$pageSize == 25 ? 'active':''}}" href="#" wire:click.prevent="changePageSize(25)">25</a></li>
                              <li><a class="{{$pageSize == 50 ? 'active':''}}" href="#" wire:click.prevent="changePageSize(50)">50</a></li>
                           </ul>
                        </div>
                     </div>
                     <div class="sort-by-cover">
                        <div class="sort-by-product-wrap">
                           <div class="sort-by">
                              <span><i class="fi-rs-apps-sort"></i> <span class="d-none d-md-inline">Sort by:</span></span>
                           </div>
                           <div class="sort-by-dropdown-wrap">
                              <span> {{$orderBy}} <i class="fi-rs-angle-small-down"></i></span>
                           </div>
                        </div>
                        <div class="sort-by-dropdown">
                           <ul>
                              <li><a class="{{$orderBy == 'Default Sorting' ? 'active':''}}" href="#" wire:click.prevent="changeOrderBy('Default Sorting')">Default Sorting</a></li>                   
                              <li><a class="{{$orderBy == 'Price: Low to High' ? 'active':''}}" href="#" wire:click.prevent="changeOrderBy('Price: Low to High')">Price: Low to High</a></li>
                              <li><a class="{{$orderBy == 'Price: High to Low' ? 'active':''}}" href="#" wire:click.prevent="changeOrderBy('Price: High to Low')">Price: High to Low</a></li>
                              <li><a class="{{$orderBy == 'Sort by Latest' ? 'active':''}}" href="#" wire:click.prevent="changeOrderBy('Sort by Latest')">Sort by Latest</a></li>
                           </ul>
                        </div>
                     </div>
                  </div>
               </div>

               <div class="row product-grid">
                  @php
                     $witems = Cart::instance('wishlist')->content()->pluck('id');
                  @endphp

                  <div class="product-flex-wrapper">
                     @foreach ($products as $pdt)
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
                                 @if ($pdt->in_stock == 'Instock')
                                    <div class="product-footer-inner">
                                       <a href="#" class="add_to_cart_button ajax_add_to_cart" 
                                       wire:click.prevent="store({{$pdt->id}}, '{{$pdt->name}}', {{$pdt->sale_price}})">
                                          Add to cart <i class="klbth-icon-shopping-bag"></i>
                                       </a>
                                    </div>
                                 @endif
                              </div>
                           </div>
                           <div class="product-content-fade"></div>
                        </div>
                     @endforeach
                  </div>
               </div>


               <!--pagination-->
               <div class="pagination-area mt-20 mb-20">
                  {{ $products->links('pagination-links') }}
               </div>
               
            </div>

            <div class="col-lg-3 col-lg-1-5dd primary-sidebar sticky-sidebar" wire:ignore>
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
                     <div class="sidebar-widget product-sidebar mb-30 p-30 bg-grey border-radius-10">
                        <h5 class="section-title style-1 mb-30">New products</h5>

                        @foreach ($new_products as $item)                     
                           <div class="single-post clearfix">
                              <div class="image">
                                 <img src="{{asset('storage/products/'.$item->image)}}" alt="{{$item->image}}">
                              </div>
                              <div class="content pt-10">
                                 <h6><a href="{{url('product/'.$item->slug)}}">{{$item->name}}</a></h6>
                                 <p class="price mb-0 mt-5">${{$item->sale_price}}</p>
                                 <div class="product-rate">
                                    <div class="product-rating" style="width: 90%"></div>
                                 </div>
                              </div>
                           </div>
                        @endforeach
                     </div>
                  </div>
               </div>

               

               <div class="banner-img wow fadeIn mb-lg-0 animated d-lg-block d-none">
                  <img src="{{asset('assets/imgs/banner/banner-11.png')}}" alt="banner" />
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
                     <div class="slider-nav-thumbnails pl-15 pr-15" wire:ignore.self>
                        
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

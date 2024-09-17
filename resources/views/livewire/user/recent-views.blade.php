<div>
   
   <main class="main">

      <div class="container mt-30 mb-30">
         <div class="row">
            <div class="col-lg-10 m-auto">

               @if (Auth::user()->recentViews->count() > 0)

               <div class="shop-product-fillter">
                  <div class="totall-product">
                     <p>You recently viewed these items !</p>
                  </div>
               </div>

               <div class="row product-grid">
                  @php
                     $witems = Cart::instance('wishlist')->content()->pluck('id');
                  @endphp

                  <div class="product-flex-wrapper">
                     @foreach (Auth::user()->recentViews as $view)
                        <div class="product product-type-1 mb-20">
                           <div class="product-wrapper">
                              <div class="product-content">
                                 <div class="thumbnail-wrapper entry-media">
                                    <div class="product-badges">
                                       @if ($view->product->badge == 'Discount')
                                          <span class="badge hot">{{$view->product->discount}} %</span>
                                       @else
                                          <span class="badge {{strtolower($view->product->badge)}}">
                                             {{$view->product->badge}}
                                          </span>
                                       @endif
                                    </div>
                                    <a class="product-thumbnail" href="{{url('product/'.$view->product->slug)}}">
                                       <img decoding="async" src="{{asset('storage/products/'.$view->product->image)}}"
                                       @if ($view->product->productImages->count() > 0)
                                          data-hover-slides="
                                             @forelse ($view->product->productImages as $item)                               
                                                {{asset('storage/pdtgallery/'.$item->image)}} @if(!$loop->last) , @endif
                                             @empty
                                             @endforelse
                                          " 
                                          data-options='{"touch": "end", "preloadImages": true }' alt="{{$view->product->name}}"
                                       @endif 
                                       >
                                    </a>
                                    <div class="product-buttons">
                                       <div wire:click="addToWishList({{$view->product->id}}, '{{$view->product->name}}', {{$view->product->sale_price}})">
                                          <i class="klbth-icon-heart-empty"></i>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="content-wrapper">
                                    <h3 class="product-title">
                                       <a href="{{url('product/'.$view->product->slug)}}">{{$view->product->name}}</a>
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
                                                {{$view->product->regular_price}}
                                             </bdi>
                                          </span>
                                       </del>
                                       <ins>
                                          <span class="amount">
                                             <bdi>
                                                <span class="">&#36;</span>
                                                {{$view->product->sale_price}}
                                             </bdi>
                                          </span>
                                       </ins>
                                    </span>
                                    @if ($view->product->in_stock == 'Instock')
                                       <a href="#" class="shop-button" wire:click.prevent="store({{$view->product->id}}, '{{$view->product->name}}', {{$view->product->sale_price}})">
                                          <i class="fi-rs-shopping-bag-add"></i>
                                       </a>
                                    @endif
                                    <div class="product-stock in-stock">
                                       <i class="klbth-icon-ecommerce-package-ready"></i>
                                       <span>{{$view->product->in_stock == 'Instock' ? 'In Stock':'Out of Stock'}}</span>
                                    </div>
                                 </div>
                              </div>
                              <div class="product-footer">
                                 @if ($view->product->in_stock == 'Instock')
                                    <div class="product-footer-inner">
                                       <a href="#" class="add_to_cart_button ajax_add_to_cart" 
                                       wire:click.prevent="store({{$view->product->id}}, '{{$view->product->name}}', {{$view->product->sale_price}})">
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

               @else
                  <div class="p-30 text-center">
                     <h5>You haven't viewed any products yet</h5>
                     <a href="/shop" class="btn mt-3">Continue to Shop</a>
                  </div>
               @endif

               
            </div>         
         </div>
      </div>
   </main>

</div>

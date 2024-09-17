<div>
   {{-- A good traveler has no fixed plans and is not intent upon arriving. --}}

   <main class="main">
      <div class="page-header breadcrumb-wrap">
            <div class="container">
               <div class="breadcrumb">
                  <a href="/" rel="nofollow">Home</a>
                  <span></span> Wishlist
               </div>
            </div>
      </div>
      <section class="mt-50 mb-50">
         <div class="container">
            <div class="row">
               <div class="col-xl-10 col-lg-12 m-auto">
                  @if (Cart::instance('wishlist')->content()->count() > 0)  
                     <div class="mb-20">
                        <h3 class="heading-2 mb-10">Your Wishlist</h3>
                        <h6 class="text-body">There are <span class="text-brand">{{Cart::instance('wishlist')->content()->count()}}</span> products in this list</h6>
                        @if (session()->has('removed'))
                           <p class="text-success">{{session('removed')}}</p>
                        @endif
                        @if (session()->has('moved-to-cart'))
                           <p class="text-success">{{session('moved-to-cart')}}</p>
                        @endif
                     </div>                    
      
                     <div class="">
                        @php
                           $cartitems = Cart::instance('cart')->content()->pluck('id');
                        @endphp
                        <div class="table-responsive shopping-summerydd">
                           <table class="table table-wishlist">
                              <thead>
                                 <tr class="main-headingdd">
                                    <th class="custome-checkbox start pl-30">
                                       <input class="form-check-input" type="checkbox" name="checkbox" id="exampleCheckbox11"
                                          value="" />
                                       <label class="form-check-label" for="exampleCheckbox11"></label>
                                    </th>
                                    <th scope="col" colspan="2">Product</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Stock Status</th>
                                    <th scope="col">Action</th>
                                    <th scope="col" class="end">Remove</th>
                                 </tr>
                              </thead>
                              <tbody>
                                 @foreach (Cart::instance('wishlist')->content() as $product)
                                    <tr class="pt-30">
                                       <td class="custome-checkbox pl-30">
                                          <input class="form-check-input" type="checkbox" name="checkbox" id="exampleCheckbox1"
                                             value="" />
                                          <label class="form-check-label" for="exampleCheckbox1"></label>
                                       </td>
                                       <td class="image product-thumbnail">
                                          <img src="{{asset('storage/products/'.$product->model->image)}}" alt="{{$product->model->image}}" />
                                       </td>
                                       <td class="product-des product-name">
                                          <h6>
                                             <a class="product-name mb-10" href="{{url('product/'.$product->model->slug)}}">
                                                {{$product->name}}
                                             </a>
                                          </h6>
                                          <div class="product-rate-cover">
                                             <div class="product-rate d-inline-block">
                                                <div class="product-rating" style="width: 90%"></div>
                                             </div>
                                             <span class="font-small ml-5 text-muted"> (4.0)</span>
                                          </div>
                                       </td>
                                       <td class="text-right" data-title="Price">
                                          <h3 class="text-brand">${{$product->price}}</h3>
                                       </td>
                                       <td class="detail-info" data-title="Stock">
                                          <span class="stock-status in-stock mb-0">
                                             {{$product->model->in_stock == 'Instock' ? 'In Stock':'Out of Stock'}}
                                          </span>
                                       </td>
                                       <td class="text-right" data-title="Cart">
                                          <button class="btn btn-sm" wire:click="moveToCart('{{$product->rowId}}')">Move to cart</button>
                                       </td>
                                       <td class="action text-center" data-title="Remove">
                                          <a href="#" class="text-body" wire:click.prevent="removeFromWishlist('{{$product->rowId}}')"><i class="fi-rs-trash"></i></a>
                                       </td>
                                    </tr>                              
                                 @endforeach
                              </tbody>
                           </table>
                        </div>
                        
                     </div>
                  @else
                     <div class="text-center">
                        <img src="{{asset('assets/imgs/cart-empty.png')}}" alt="cart icon" style="width: 100px">
                        <h2>Your wishlist is <span class="text-danger">empty!</span></h2>
                        <p>Looks like you haven't added any products to your wishlist yet</p>
                        <a href="/shop" class="btn mt-10" style="border-radius: 10px">Return to shop</a>
                     </div> 
                  @endif

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

                              {{-- @forelse ($quick_pdt->productImages as $item)
                                 <figure class="border-radius-10">
                                    <img src="{{asset('storage/pdtgallery/'.$item->image)}}" alt="{{$item->image}}">
                                 </figure>                                   
                              @empty
                                    
                              @endforelse --}}
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
</div>

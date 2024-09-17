<div>
   <div class="d-flex gap-3 mt-3">

      @foreach ($offers as $pdt)
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
               </div>
            </div>
         </div>
      </div>
      @endforeach

   <div>
</div>

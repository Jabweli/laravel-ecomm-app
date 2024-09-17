<div>
   <div class="card account-card">
      <div class="card-header d-flex align-items-center gap-3">
         <div class="back-arrow" onclick="document.getElementById('tab-content').style.display='none'; 
         document.getElementById('tab-list').style.display='block'">
            <i class="fas fa-arrow-left"></i>
         </div>
         <h5 class="mb-0">Saved Items</h5>
         @if (session()->has('removed'))
            <span class="text-success">{{session('removed')}}</span>
         @endif
      </div>
      <div class="acct-order-container">
         <div class="table-responsive">
            @forelse (Cart::instance('wishlist')->content() as $item)
               <div class="account-orders">
                  <div class="acct-order-image">
                     <img src="{{asset('storage/products/'.$item->model->image)}}" 
                     alt="{{$item->model->image}}">
                  </div>
   
                  <div class="acct-order-text saved-item">
                     <h6>
                        <a href="{{url('product/'.$item->model->slug)}}">{{$item->name}}</a>
                     </h6>
                     <h5 class="mt-3">${{$item->price}}</h5>
                     <span style="font-size: 17px; text-decoration: line-through; font-weight: bold">${{$item->model->regular_price}}</span>
                     <span class="badge bg-secondary p-1 text-white">-{{$item->model->discount}}%</span>
                  </div>
   
                  <div class="acct-saved-btn">
                     <div>
                        <button class="btn btn-sm" wire:click="buyNow('{{$item->rowId}}')">BUY NOW</button>
                     </div>
                     <div>
                        <button class="btn btn-sm remove-btn" wire:click="remove('{{$item->rowId}}')">
                           <i class="fas fa-trash"></i> REMOVE
                        </button>
                     </div>
                  </div>
               </div>
            @empty
               <div class="acct-inbox d-flex flex-column align-items-center justify-content-between gap-2">
                  <img src="{{asset('assets/imgs/review.svg')}}" alt="review">
                  <h6>You have no saved items</h6>
                  <p class="mt-2">
                     After adding your products to wishlist, you will be able to view them here. 
                     You can later move them to cart and checkout !
                  </p>
                  <a href="/shop" class="btn mt-3">Continue Shopping</a>
               </div>
            @endforelse
   
         </div>
      </div>
   </div>
</div>

<div>
   <div class="card account-card" id="order-card">
      <div class="card-header d-flex align-items-center gap-3">
         <div class="back-arrow">
            <a href="/my-account">
               <i class="fas fa-arrow-left"></i>
            </a>
         </div>
         <h5 class="mb-0">Your Orders</h5>
      </div>
      <div class="acct-order-container">
         <div class="table-responsive">
            @forelse (Auth::user()->orders as $order)
               @foreach ($order->orderItems as $item)
                  <div class="account-orders">
                     <div class="acct-order-image">
                        <img src="{{asset('storage/products/'.$item->product->image)}}" 
                        alt="{{$item->product->image}}">
                     </div>

                     <div class="acct-order-text">
                        <h6>
                           <a href="{{url('/my-account/order/'.$order->id)}}">{{$item->product->name}}</a>
                        </h6>
                        <p class="mb-0">Order #{{$order->id}}</p> 
                        <p class="badge bg-success">{{strtoupper($order->status)}}</p>
                        <h6>{{date('d F Y', strtotime($order->created_at))}}</h6>
                     </div>

                     <div class="acct-order-btn">
                        <a class="float-end button" href="{{url('/my-account/order/'.$order->id)}}">SEE DETAILS</a>
                     </div>
                  </div>
               @endforeach
            @empty
               <div class="acct-inbox d-flex flex-column align-items-center justify-content-center text-center">
                  <img src="{{asset('assets/imgs/cart-empty.png')}}" alt="chat-icon" style="width: 120px">
                  <h6>You have no orders</h6>
                  <p style="max-width: 400px">
                     You will be able to view your orders and manage your order statuses from here
                  </p>
                  <a href="/shop" class="btn mt-3">Continue Shopping</a>
               </div>
            @endforelse

         </div>
      </div>
   </div>
</div>

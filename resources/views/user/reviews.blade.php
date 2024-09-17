@extends('layouts.user')

@section('content')
<div class="card account-card">
   <div class="card-header d-flex align-items-center gap-3">
      <div class="back-arrow" onclick="document.getElementById('tab-content').style.display='none'; 
      document.getElementById('tab-list').style.display='block'">
         <i class="fas fa-arrow-left"></i>
      </div>
      <h5 class="mb-0">Pending Reviews</h5>
   </div>
   <div class="acct-order-container">
      <div class="table-responsive">
         @forelse (Auth::user()->orders->where('status', 'delivered') as $order)
            @foreach ($order->orderItems as $item)
               @if (!Auth::user()->reviews->where('product_id', $item->product->id)->first())
                  
                  <div class="account-orders">
                     <div class="acct-order-image">
                        <img src="{{asset('storage/products/'.$item->product->image)}}" 
                        alt="{{$item->product->image}}">
                     </div>

                     <div class="acct-order-text">
                        <h6>{{$item->product->name}}</h6>
                        <p class="mb-0 mt-3"><strong>Order #{{$order->id}}</strong></p> 
                        <span>Delivered on {{date('d-m-Y', strtotime($order->created_at))}}</span>
                     </div>

                     <div class="acct-rate-btn">
                        <a href="/my-account/rate/{{$item->product->id}}">Rate this product</a>
                     </div>
                  </div>
               @endif            
            @endforeach
         @empty
            <div class="acct-inbox d-flex flex-column align-items-center justify-content-between gap-2">
               <img src="{{asset('assets/imgs/review.svg')}}" alt="review">
               <h6>You have no orders waiting for feedback</h6>
               <p class="mt-2">
                  After getting your products delivered, you will be able to rate and review them. 
                  Your feedback will be published on the product page to help all users 
                  get the best shopping experience!
               </p>
               <a href="/shop" class="btn mt-3">Continue Shopping</a>
            </div>
         @endforelse

      </div>
   </div>
</div>
@endsection
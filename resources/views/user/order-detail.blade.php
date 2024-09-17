@extends('layouts.user')

@section('content')
   

<div class="card" id="order-detail-card">
   <div class="card-header d-flex align-items-center gap-3">
      <div class="detail back-arrow">
         <a href="/my-account/orders">
            <i class="fas fa-arrow-left"></i>
         </a>
      </div>
      <h5 class="mb-0">Order Details</h5>
   </div>
   <div class="acct-order-container">
      <h6>Order No. #{{$order->id ?? 'N/A'}}</h6>
      <p>{{$order->orderItems->count()}} items</p>
      <p>Placed on {{date('d-F-y', strtotime($order->created_at))}}</p>
      <p>Total: <strong>${{$order->total}}</strong></p>

      <hr>

      <div class="order-items">
         <h6 class="mb-2">ITEMS IN YOUR ORDER</h6>

         @foreach ($order->orderItems as $item)
            <div class="items-container">
               <div>
                  <span class="badge bg-success">{{strtoupper($order->status)}}</span>
                  <span class="badge bg-warning">NON-RETURNABLE</span>
                  <h6 class="mt-2">on {{date('d-m-Y', strtotime($order->created_at))}}</h6>
               </div>

               <div class="d-flex gap-3 mt-3 flex-wrap">
                  <div style="width: 120px">
                     <img src="{{asset('storage/products/'.$item->product->image)}}" 
                     alt="{{$item->product->image}}" class="w-100" style="border-radius: 6px; object-fit: cover">
                  </div>

                  <div class="acct-order-text">
                     <h6>{{$item->product->name}}</h6>
                     <p class="mt-1">Quantity: {{$item->quantity}}</p>
                     <div class="mt-1">
                        <span>Price: 
                           <span class="acct-order-price">${{$item->product->sale_price}}</span>
                           <span class="acct-order-price-2">${{$item->product->regular_price}}</span>
                        </span>
                        <p class="mt-3" style="font-size: 14px">
                           The return period ended on (26-11-2020) <a href="/return-policy">Access our Return Policy</a>.
                        </p>
                     </div>
                  </div>
               </div>
            </div>
         @endforeach
      </div>

      <div class="row mt-4">
         <div class="col-md-6 mb-3">
            <div class="item-wrapper">
               <div class="item-header">
                  <h6>PAYMENT INFORMATION</h6>
               </div>

               <div class="item-info">
                  <h6 class="mb-2">Payment method</h6>
                  <span>{{$order->transaction?->mode == 'paypal' ? 'Paypal':'Pay on delivery'}}</span>

                  <h6 class="mt-3 mb-2">Payment details</h6>
                  <span>Items total: ${{$order->subtotal}}</span> <br>
                  <span>Shipping Fees & tax: ${{$order->tax}}</span>  <br>
                  <span>Total: <strong>${{$order->total}}</strong></span>
               </div>
            </div>
         </div>

         <div class="col-md-6 mb-3">
            <div class="item-wrapper">
               <div class="item-header">
                  <h6>DELIVERY INFORMATION</h6>
               </div>
               <div class="item-info">
                  <h6 class="mb-2">Delivery method</h6>
                  <span>Door delivery</span>

                  <h6 class="mt-3 mb-2">Shipping address</h6>
                  <span>STANLEY JABWEL</span> <br>
                  <span>Crane Chambers</span> <br>
                  <span>Down Town Kampala, Kampala Region</span>

                  <h6 class="mt-3 mb-2">Shipping details</h6>
                  <span>Door Delivery. Fulfilled by The Loafer Store</span> <br>
                  <span>Delivery between <b>10 June and 11 June</b></span>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>


@endsection
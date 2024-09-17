<div>
   
   <div class="container-fluid px-4 pb-5" style="padding-top: 90px;">

      <div class="row border-0 border-bottomdd pb-1 mb-2">
         <div class="col-md-8">
            <h3>Order Details</h3>
         </div>
         <div class="col-md-4">
            <a href="{{url('admin/orders')}}" class="btn btn-info float-end me-2"><i class="ti ti-arrow-left"></i> Go back</a>
         </div>
      </div>

      <div class="acct-order-container">
         <div class="row">
            <div class="col-md-4">
               <h5>Order No. #{{$order->id ?? 'N/A'}}</h5>
               <p class="mb-1">Quantity: {{$order->orderItems->count()}} items</p>
               <p class="mb-1">Placed on {{date('d-F-y', strtotime($order->created_at))}}</p>
               <p class="mb-1">Total: <strong>${{$order->total}}</strong></p>
            </div>

            <div class="col-md-3">
               <h5>Update order status</h5>
               <form action="#">
                  <div class="d-flex gap-1 form-group">
                     <select class="form-select">
                        <option value="">Select option</option>
                        <option value="New">New</option>
                        <option value="Pending">Pending</option>
                        <option value="Cancelled">Cancelled</option>
                        <option value="In process">In process</option>
                        <option value="Shipped">Shipped</option>
                        <option value="Partially shipped">Partially shipped</option>
                        <option value="Delivered">Delivered</option>
                        <option value="Partially delivered">Partially delivered</option>
                        <option value="Paid">Paid</option>
                     </select>

                     <button class="btn btn-info">Update</button>
                  </div>
               </form>
            </div>

            <div class="col-md-5"></div>
         </div>
   
         <hr>
   
         <div class="order-items">
            <h6 class="mb-2">ITEMS IN ORDER</h6>
   
            @foreach ($order->orderItems as $item)
               <div class="items-container">
                  <div>
                     <span class="badge bg-success">{{strtoupper($order->status)}}</span>
                     <span class="badge bg-warning">NON-RETURNABLE</span>
                     <h6 class="mt-2">on {{date('d-m-Y', strtotime($order->created_at))}}</h6>
                  </div>
   
                  <div class="d-flex gap-3 flex-wrap">
                     <div style="width: 90px;">
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
                        </div>
                     </div>
                  </div>
               </div>
            @endforeach
         </div>
   
         <div class="row mt-4">
            <div class="col-md-4 mb-3">
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

            <div class="col-md-4 mb-3">
               <div class="item-wrapper">
                  <div class="item-header">
                     <h6>CUSTOMER INFORMATION</h6>
                  </div>
   
                  <div class="item-info">
                     <h6 class="mb-2">Customer names</h6>
                     <span>Firstname: {{$order->firstname}}</span> <br>
                     <span>Lastname: {{$order->lastname}}</span>
   
                     <h6 class="mt-3 mb-2">Customer contacts</h6>
                     <span>Mobile: {{$order->mobile}}</span> <br>
                     <span>Email address: {{$order->email}}</span>  <br>
                  </div>
               </div>
            </div>
   
            <div class="col-md-4 mb-3">
               <div class="item-wrapper">
                  <div class="item-header">
                     <h6>DELIVERY INFORMATION</h6>
                  </div>
                  <div class="item-info">
                     <h6 class="mb-2">Delivery method</h6>
                     <span>Door delivery</span>
   
                     <h6 class="mt-3 mb-2">Shipping address</h6>
                     @if ($order->is_shipping_different)
                        <span>{{strtoupper($order->shipping->firstname)}} {{strtoupper($order->shipping->lastname)}}</span> <br>
                        <span>{{$order->shipping->line1}}</span> <br>
                        <span>{{$order->shipping->city}}, {{$order->shipping->country}}</span>
                     @else
                        <span>{{strtoupper($order->firstname)}} {{strtoupper($order->lastname)}}</span> <br>
                        <span>{{$order->line1}}</span> <br>
                        <span>{{$order->city}}, {{$order->country}}</span>
                     @endif
                     
   
                     <h6 class="mt-3 mb-2">Shipping details</h6>
                     <span>Door Delivery. Fulfilled by The Loafer Store</span> <br>
                     <span>Delivery between <b>10 June and 11 June</b></span>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div> 

</div>

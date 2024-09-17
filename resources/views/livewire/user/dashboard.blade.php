<div>
   <div class="card account-card">
      <div class="card-header d-flex align-items-center gap-3">
         <div class="back-arrow">
            <a href="/my-account">
               <i class="fas fa-arrow-left"></i>
            </a>
         </div>
         <h5 class="mb-0">Hello {{Auth::user()->name}}! </h5>
      </div>
      <div class="card-body">
         <p>
            From your account dashboard. you can easily check &amp; view your <a href="/my-account/orders">recent orders</a>, 
            manage your <a href="/my-account/address-book">shipping and billing addresses</a> and 
            <a href="#">edit your password and account details.</a>
         </p>

         <div class="row mt-4">
            <div class="col-md-6 mb-3">
               <div class="item-wrapper">
                  <div class="item-header">
                     <h6>ACCOUNT DETAILS</h6>
                  </div>
   
                  <div class="item-info">
                     <h6>{{Auth::user()->name}}</h6>
                     <p>{{Auth::user()->email}}</p>
                  </div>
               </div>
            </div>
            @php
               $address = DB::table('addresses')->where('user_id', Auth::user()->id)->first();
            @endphp
            <div class="col-md-6 mb-3">
               <div class="item-wrapper">
                  <div class="item-header d-flex align-items-center justify-content-between">
                     <h6>ADDRESS BOOK</h6>
                     @if ($address)
                        <a href="/my-account/address/edit/{{$address->id}}"><i class="fi-rs-edit"></i></a>
                     @endif
                  </div>
                  
                  <div class="item-info">
                     
                     @if ($address)
                        <h6 class="mb-2">Your default shipping address</h6>
                        <span>{{strtoupper($address->firstname)}} {{strtoupper($address->lastname)}}</span> <br>
                        <span>{{$address->line1}}</span> <br>
                        <span>{{$address->city}}, {{$address->country}}</span> <br>
                        <span>{{$address->mobile}}</span> <br>
                     @else
                        <p>You haven't added a default shipping address</p>
                        <a href="/my-account/address/add" class="btn btn-sm">ADD ADDRESS</a>
                     @endif
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>

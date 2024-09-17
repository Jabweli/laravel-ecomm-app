<div>
   <div class="card account-card">
      <div class="card-header address-card-header">
         <div class="back-arrow">
            <a href="/my-account">
               <i class="fas fa-arrow-left"></i>
            </a>
         </div>
         <h5 class="mb-0">
            Addresses ({{Auth::user()->addresses->count()}}) 
         </h5>
         <a href="/my-account/address/add" class="btn btn-sm shadow-sm">ADD NEW ADDRESS</a>
      </div>
      <div class="card-body address-card-body">
         @if (session()->has('saved'))
            <span class="text-success">{{session('saved')}}</span>
         @endif
         @if (session()->has('deleted'))
            <span class="text-success">{{ session('deleted') }}</span>
         @endif
         @if (session()->has('updated'))
            <span class="text-success">{{ session('updated') }}</span>
         @endif
         @if (session()->has('default'))
            <span class="text-success">{{ session('default') }}</span>
         @endif
         <div class="row">
            @forelse (Auth::user()->addresses as $address)
               <div class="col-lg-6 mb-3">
                  <div class="address-box">
                     <div class="address-info">
                        <h5 class="mb-2">{{$address->firstname}} {{$address->lastname}}</h5>
                        <p>Phone: {{$address->mobile}}</p>
                        <p>Email: {{$address->email}}</p>
                        <p>Country: {{$address->country}}</p>
                        <p>Address 1: {{$address->line1}}</p>
                        <p>City: {{$address->city}}</p>
                        <p>State: {{$address->state}}</p>
                        <p>PostalCode: {{$address->zipcode}}</p>
   
                        <div class="mt-2">
                           @if ($address->make_default)
                              <span class="custom-badge bg-warning">DEFAULT ADDRESS</span>
                           @else
                              <p>Set As: {{$address->make_as}} address</p>
                           @endif
                        </div>
                     </div>
                     <div class="address-footer">
                        <div class="row">
                           <div class="col-6">
                              @if ($address->make_default)
                                 <span class="fw-bold" style="cursor: pointer">SET AS DEFAULT</span>
                              @else
                                 <a href="#" wire:click.prevent="setDefault({{$address->id}})">SET AS DEFAULT</a>
                              @endif
                           </div>
                           <div class="col-6">
                              <a href="#" class="float-end" wire:click.prevent="delete({{$address->id}})"><i class="fi-rs-trash"></i></a>
                              <a href="/my-account/address/edit/{{$address->id}}" class="float-end me-4"><i class="fi-rs-edit"></i></a>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            @empty
               <div class="acct-inbox d-flex flex-column align-items-center justify-content-center">
                  <img src="{{asset('assets/imgs/chat-icon.png')}}" alt="chat-icon" style="width: 150px">
                  <h6>You haven't added any addresses yet</h6>
                  <p class="mt-3">From here you will be able to manage your billing and shipping addresses</p>
                  <p>Thank you for shopping with us.</p>
               </div>
            @endforelse
            
         </div>
   
         <a href="/my-account/address/add" class="address-mobile-btn btn btn-sm shadow-sm">ADD NEW ADDRESS</a>
      </div>
   </div>
</div>

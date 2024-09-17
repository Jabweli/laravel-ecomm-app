<div>
   {{-- Do your work, then step back. --}}
   
   <main class="main">
      <div class="page-header breadcrumb-wrap">
         <div class="container">
            <div class="breadcrumb">
               <a href="/" rel="nofollow">Home</a>                    
               <span></span> My Account
            </div>
         </div>
      </div>
      <section class="account-container">
         <div class="container">
            <div class="row">
               <div class="col-lg-11 m-auto">
                  <div class="row">
                     <div class="col-lg-3" id="tab-list" wire:ignore>
                        
                     </div>

                     <div class="col-lg-9" id="tab-content" wire:ignore>
                        <div class="tab-content dashboard-content">

                           <div class="tab-pane fade active show" id="dashboard" role="tabpanel" aria-labelledby="dashboard-tab">
                              <div class="card">
                                 <div class="card-header d-flex align-items-center gap-3">
                                    <div class="back-arrow" onclick="document.getElementById('tab-content').style.display='none'; 
                                    document.getElementById('tab-list').style.display='block'">
                                       <i class="fas fa-arrow-left"></i>
                                    </div>
                                    <h5 class="mb-0">Hello {{Auth::user()->name}}! </h5>
                                 </div>
                                 <div class="card-body">
                                    <p>From your account dashboard. you can easily check &amp; view your <a href="#">recent orders</a>, manage your <a href="#">shipping and billing addresses</a> and <a href="#">edit your password and account details.</a></p>
                                 </div>
                              </div>
                           </div>

                           <div class="tab-pane fade" id="orders" role="tabpanel" aria-labelledby="orders-tab">
                              <div class="card" id="order-card">
                                 <div class="card-header d-flex align-items-center gap-3">
                                    <div class="back-arrow" onclick="document.getElementById('tab-content').style.display='none'; 
                                    document.getElementById('tab-list').style.display='block'">
                                       <i class="fas fa-arrow-left"></i>
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
                                                   <h6 wire:click="fetch({{$order->id}})" onclick="document.getElementById('order-card').style.display='none'; 
                                                      document.getElementById('order-detail-card').style.display='block'">
                                                      {{$item->product->name}}
                                                   </h6>
                                                   <p class="mb-0">Order #{{$order->id}}</p> 
                                                   <p class="badge bg-success">{{strtoupper($order->status)}}</p>
                                                   <h6>{{date('d F Y', strtotime($order->created_at))}}</h6>
                                                </div>

                                                <div class="acct-order-btn">
                                                   <button type="button" wire:click="fetch({{$order->id}})" onclick="document.getElementById('order-card').style.display='none'; 
                                                      document.getElementById('order-detail-card').style.display='block'">
                                                      See details
                                                   </button>
                                                </div>
                                             </div>
                                          @endforeach
                                       @empty
                                          
                                       @endforelse

                                    </div>
                                 </div>
                              </div>

                              <div class="card" id="order-detail-card">
                                 <div class="card-header d-flex align-items-center gap-3">
                                    <div class="back-arrow" onclick="document.getElementById('order-detail-card').style.display='none'; 
                                    document.getElementById('order-card').style.display='block'" wire:ignore.self>
                                       <i class="fas fa-arrow-left"></i>
                                    </div>
                                    <h5 class="mb-0">Order Detail</h5>
                                 </div>
                                 <div class="acct-order-container">
                                    <h6>Order No. {{$name ?? 'N/A'}}</h6>
                                 </div>
                              </div>
                           </div>

                           <div class="tab-pane fade" id="reviews" role="tabpanel" aria-labelledby="reviews-tab">
                              <div class="card">
                                 <div class="card-header d-flex align-items-center gap-3">
                                    <div class="back-arrow" onclick="document.getElementById('tab-content').style.display='none'; 
                                    document.getElementById('tab-list').style.display='block'">
                                       <i class="fas fa-arrow-left"></i>
                                    </div>
                                    <h5 class="mb-0">Pending Reviews</h5>
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
                                                   <h6>{{$item->product->name}}</h6>
                                                   <p class="mb-0 mt-3"><strong>Order #{{$order->id}}</strong></p> 
                                                   <span>Delivered on {{date('d-m-Y', strtotime($order->created_at))}}</span>
                                                </div>

                                                <div class="acct-rate-btn">
                                                   <button type="button">Rate this product</button>
                                                </div>
                                             </div>
                                          @endforeach
                                       @empty
                                          
                                       @endforelse

                                    </div>
                                 </div>
                              </div>
                           </div>
                           
                           <div class="tab-pane fade" id="address" role="tabpanel" aria-labelledby="address-tab">
                              <div class="row">
                                 <div class="col-lg-6">
                                    <div class="card mb-3 mb-lg-0">
                                       <div class="card-header">
                                          <h5 class="mb-0">Billing Address</h5>
                                       </div>
                                       <div class="card-body">
                                          <address>000 Interstate<br> 00 Business Spur,<br> Sault Ste. <br>Marie, MI 00000</address>
                                          <p>New York</p>
                                          <a href="#" class="btn-small">Edit</a>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-lg-6">
                                    <div class="card">
                                       <div class="card-header">
                                          <h5 class="mb-0">Shipping Address</h5>
                                       </div>
                                       <div class="card-body">
                                          <address>4299 Express Lane<br>
                                                Sarasota, <br>FL 00000 USA <br>Phone: 1.000.000.0000</address>
                                          <p>Sarasota</p>
                                          <a href="#" class="btn-small">Edit</a>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>

                           <div class="tab-pane fade" id="account-detail" role="tabpanel" aria-labelledby="account-detail-tab">
                              <div class="card">
                                 <div class="card-header">
                                    <h5>Account Details</h5>
                                 </div>
                                 <div class="card-body px-4">
                                    <p>Edit your account information</p>
                                    <form method="post" name="enq">
                                       <div class="row">
                                          <div class="form-group col-md-6">
                                                <label>First Name <span class="required">*</span></label>
                                                <input required="" class="form-control square" name="name" type="text">
                                          </div>
                                          <div class="form-group col-md-6">
                                                <label>Last Name <span class="required">*</span></label>
                                                <input required="" class="form-control square" name="phone">
                                          </div>
                                          <div class="form-group col-md-12">
                                                <label>Display Name <span class="required">*</span></label>
                                                <input required="" class="form-control square" name="dname" type="text">
                                          </div>
                                          <div class="form-group col-md-12">
                                                <label>Email Address <span class="required">*</span></label>
                                                <input required="" class="form-control square" name="email" type="email">
                                          </div>
                                          <div class="form-group col-md-12">
                                                <label>Current Password <span class="required">*</span></label>
                                                <input required="" class="form-control square" name="password" type="password">
                                          </div>
                                          <div class="form-group col-md-12">
                                                <label>New Password <span class="required">*</span></label>
                                                <input required="" class="form-control square" name="npassword" type="password">
                                          </div>
                                          <div class="form-group col-md-12">
                                                <label>Confirm Password <span class="required">*</span></label>
                                                <input required="" class="form-control square" name="cpassword" type="password">
                                          </div>
                                          <div class="col-md-12">
                                                <button type="submit" class="btn btn-fill-out submit" name="submit" value="Submit">Save</button>
                                          </div>
                                       </div>
                                    </form>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
   </main>

   
</div>


@push('scripts')
   {{-- <script>
      let tabs = document.getElementsByClassName('nav-tab');

      if (window.innerWidth < 992) {
         for (let i = 0; i <= tabs.length; i++) {
            tabs[i].addEventListener('click', function() {
               document.getElementById('tab-list').style.display = 'none';
               document.getElementById('tab-content').style.display = 'block';
            });
         }

         let arrows = document.getElementsByClassName('back-arrow');

         for (let i = 0; i <= arrows.length; i++) {
            arrows[i].addEventListener('click', function() {
               document.getElementById('tab-list').style.display = 'block';
               document.getElementById('tab-content').style.display = 'none';
            });
         }
      }

      $(window).resize(function() {

         if (window.innerWidth > 768) {
            document.getElementById('tab-list').style.display = 'block';
            document.getElementById('pref-info').style.display = 'block';
         }
      });

      

   </script> --}}
@endpush
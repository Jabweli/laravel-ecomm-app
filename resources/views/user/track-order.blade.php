@extends('layouts.user')


@section('content')
   
<div class="card account-card">
   <div class="card-header d-flex align-items-center gap-3">
      <div class="back-arrow">
         <a href="/my-account">
            <i class="fas fa-arrow-left"></i>
         </a>
      </div>
      <h5 class="mb-0">Track Your Orders</h5>
   </div>
   <div class="card-body px-lg-5 px-md-5">
      <p>To track your order please enter your OrderID in the box below and press "Track Order"
         button. This was given to you on your receipt and in the confirmation email you
         should have received.</p>
      <div class="row">
         <div class="col-lg-12">
            <form class="contact-form-style mt-30 mb-50" action="#" method="post">
               <div class="form-group mb-20">
                  <h6 class="mb-2">Order ID</h6>
                  <input name="order-id"
                     placeholder="Found in your order confirmation email" type="text" />
               </div>
               <div class="form-group mb-20">
                  <h6 class="mb-2">Billing email</h6>
                  <input name="billing-email" placeholder="Email you used during checkout"
                     type="email" />
               </div>
               <button class="btn" type="submit">Track Order</button>
            </form>
         </div>
      </div>
   </div>
</div>

@endsection
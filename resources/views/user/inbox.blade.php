@extends('layouts.user')

@section('content')

<div class="card account-card" id="order-card">
   <div class="card-header d-flex align-items-center gap-3">
      <div class="back-arrow">
         <a href="/my-account">
            <i class="fas fa-arrow-left"></i>
         </a>
      </div>
      <h5 class="mb-0">Inbox</h5>
   </div>
   <div class="acct-inbox-container">
      <div class="acct-inbox d-flex flex-column align-items-center justify-content-center">
         <img src="{{asset('assets/imgs/chat-icon.png')}}" alt="chat-icon" style="width: 150px">
         <h6>You don't have any messages</h6>
         <p class="mt-3">Here you will be able to see all the messages that we send you</p>
         <p>Stay tuned.</p>
      </div>
   </div>
</div>
@endsection
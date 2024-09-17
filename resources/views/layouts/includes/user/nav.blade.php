<div class="dashboard-menu">
   <ul class="nav flex-column" role="tablist">
      <li class="nav-item">
         <a class="nav-link {{request()->is('my-account/dashboard') ? 'active':''}} {{request()->is('my-account') ? 'active':''}}" href="/my-account/dashboard">
            <i class="fi-rs-settings-sliders mr-10"></i>Dashboard
            <span class="float-end"><i class="fi-rs-arrow-right"></i></span>
         </a>
      </li>
      <li class="nav-item">
         <a class="nav-link {{request()->is('my-account/orders') ? 'active':''}} {{request()->is('my-account/order/*') ? 'active':''}}" 
            href="/my-account/orders">
            <i class="fi-rs-shopping-bag mr-10"></i>Orders
            <span class="float-end"><i class="fi-rs-arrow-right"></i></span>
         </a>
      </li>
      <li class="nav-item">
         <a class="nav-link {{request()->is('my-account/inbox') ? 'active':''}}" id="inbox-tab" href="/my-account/inbox">
            <i class="fi-rs-envelope mr-10"></i>Inbox
            <span class="float-end"><i class="fi-rs-arrow-right"></i></span>
         </a>
      </li>
      <li class="nav-item">
         <a class="nav-link {{request()->is('my-account/track-order') ? 'active':''}}" href="/my-account/track-order">
            <i class="fi-rs-shopping-cart-check mr-10"></i>Track Your Order
            <span class="float-end"><i class="fi-rs-arrow-right"></i></span>
         </a>
      </li>
      <li class="nav-item">
         <a class="nav-link {{request()->is('my-account/reviews') ? 'active':''}} 
            {{request()->is('my-account/rate/*') ? 'active':''}}" href="/my-account/reviews">
            <i class="fi-rs-edit mr-10"></i>Pending reviews
            <span class="float-end"><i class="fi-rs-arrow-right"></i></span>
         </a>
      </li>
      <li class="nav-item">
         <a class="nav-link {{request()->is('my-account/saved-items') ? 'active':''}}" href="/my-account/saved-items">
            <i class="fi-rs-heart mr-10"></i>Saved Items
            <span class="float-end"><i class="fi-rs-arrow-right"></i></span>
         </a>
      </li>
      <li class="nav-item">
         <a class="nav-link" href="/recently-viewed">
            <i class="fi-rs-clock mr-10"></i>Recently viewed
            <span class="float-end"><i class="fi-rs-arrow-right"></i></span>
         </a>
      </li>
      <li class="nav-item">
         <a class="nav-link {{request()->is('my-account/address-book') ? 'active':''}} 
         {{request()->is('my-account/address/add') ? 'active':''}} {{request()->is('my-account/address/edit/*') ? 'active':''}}" 
         href="/my-account/address-book">
            <i class="fi-rs-marker mr-10"></i>Address Book
            <span class="float-end"><i class="fi-rs-arrow-right"></i></span>
         </a>
      </li>
      <li class="nav-item">
         <a class="nav-link {{request()->is('my-account/account-details') ? 'active':''}}" 
         href="/my-account/account-details" >
            <i class="fi-rs-user mr-10"></i>Account Management
            <span class="float-end"><i class="fi-rs-arrow-right"></i></span>
         </a>
      </li>
      <li class="nav-item">
         <form action="{{route('logout')}}" method="post">
            @csrf
            <a class="nav-link" href="{{route('logout')}}" onclick="event.preventDefault(); this.closest('form').submit();">
               <i class="fi-rs-sign-out mr-10"></i>Logout
            </a>
         </form>
      </li>
   </ul>
</div>
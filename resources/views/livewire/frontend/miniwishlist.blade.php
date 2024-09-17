<div>
   {{-- Close your eyes. Count to one. That is how long forever feels. --}}
   <div class="header-action-icon-2">
      <a href="/wishlist">
         <img class="svgInject" alt="wishlist" src="{{asset('assets/imgs/theme/icons/icon-heart.svg')}}">
         <span class="pro-count blue">
            {{Cart::instance('wishlist')->count() > 0 ? Cart::instance('wishlist')->count() : 0}}
         </span>
      </a>
   </div>
</div>

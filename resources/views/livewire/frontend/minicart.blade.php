<div>
   {{-- Stop trying to control. --}}
   <div class="header-action-icon-2 d-flex">
      <a class="mini-cart-icon" href="/cart">
         <img alt="cart" src="{{asset('assets/imgs/theme/icons/icon-cart.svg')}}">
         <span class="pro-count blue">
            {{Cart::instance('cart')->count() > 0 ? Cart::instance('cart')->count() : 0 }}
         </span>
      </a>
      <a href="/cart">
         <div class="hide-cart-subtotal-mobile">
            <h5 class="ms-2" style="margin-top: 7px">${{Cart::instance('cart')->subtotal()}}</h5> 
         </div>
      </a>

   
      <div class="cart-dropdown-wrap cart-dropdown-hm2">
         @if (session()->has('removed'))
            <span class="text-success text-center d-block">{{session('removed')}}</span>
         @endif
         @if (Cart::instance('cart')->count() > 0)
   
            <ul>
               @foreach (Cart::instance('cart')->content() as $item)            
                  <li>
                     <div class="shopping-cart-img">
                        <a href="{{url('product/'.$item->model->slug)}}">
                           <img alt="{{$item->model->image}}" src="{{asset('storage/products/'.$item->model->image)}}">
                        </a>
                     </div>
                     <div class="shopping-cart-title">
                        <h4>
                           <a href="{{url('product/'.$item->model->slug)}}">
                              {{strlen($item->name) > 20 ? substr($item->name, 0, 20).'...' : $item->name}}
                           </a>
                        </h4>
                        <h4><span>{{$item->qty}} × </span>${{$item->price}}</h4>
                     </div>
                     <div class="shopping-cart-delete">
                        <a href="#"><i class="fi-rs-trash" wire:click.prevent="destroy('{{$item->rowId}}')"></i></a>
                     </div>
                  </li>
               @endforeach
            </ul>
            <div class="shopping-cart-footer">
               <div class="shopping-cart-total">
                  <h4>Total <span>${{Cart::subtotal()}}</span></h4>
               </div>
               <div class="shopping-cart-button">
                  <a href="{{url('cart')}}" class="outline">View cart</a>
                  <a href="{{url('checkout')}}">Checkout</a>
               </div>
            </div>
   
         @else
            <div class="text-center">
               <h4>Your cart is empty!</h4>
               <a class="" href="/shop"></i><b>Shop now <i class="fas fa-arrow-right"></i></b></a>
            </div>
         @endif
      </div>

   </div>
</div>

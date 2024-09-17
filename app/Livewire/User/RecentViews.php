<?php

namespace App\Livewire\User;

use Livewire\Component;
use App\Livewire\Frontend\Minicart;
use App\Livewire\Frontend\Miniwishlist;
use Gloudemans\Shoppingcart\Facades\Cart;

class RecentViews extends Component
{
   public function render()
   {
      return view('livewire.user.recent-views');
   }

   // add to cart
   public function store($product_id, $product_name, $product_price){
      Cart::instance('cart')->add($product_id, $product_name, 1, $product_price)->associate('App\Models\Product');
      $this->dispatch('addedToCart')->self();
      $this->dispatch('addedToCart')->to(Minicart::class);
   }

   // add to wishList
   public function addToWishList($product_id, $product_name, $product_price){

      Cart::instance('wishlist')->add($product_id, $product_name, 1, $product_price)->associate('App\Models\Product');
      $this->dispatch('addedToWishList')->self();
      $this->dispatch('addedToWishList')->to(Miniwishlist::class);
   }
}

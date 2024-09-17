<?php

namespace App\Livewire\User;

use Livewire\Component;
use App\Livewire\Frontend\Miniwishlist;
use Gloudemans\Shoppingcart\Facades\Cart;

class SavedItems extends Component
{
   public function render()
   {
      return view('livewire.user.saved-items');
   }

   // remove item from wishlist and add to cart
   public function buyNow($rowId){
      $item = Cart::instance('wishlist')->get($rowId);
      Cart::instance('wishlist')->remove($rowId);
      Cart::instance('cart')->add($item->id,$item->name,1,$item->price)->associate('App\Models\Product');

      return redirect('/cart');
   }

   // remove item from wishlist
   public function remove($rowId){
      Cart::instance('wishlist')->remove($rowId);
      $this->dispatch('addedToWishList')->to(Miniwishlist::class);
      session()->flash('removed', 'Item removed!');
   }
}

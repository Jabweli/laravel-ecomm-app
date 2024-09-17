<?php

namespace App\Livewire\Frontend;

use App\Models\Product;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Livewire\Frontend\Miniwishlist;
use Gloudemans\Shoppingcart\Facades\Cart;

class Wishlist extends Component
{


  public $quick_pdt;
  public function quickView($id)
  {
    $this->quick_pdt = Product::where('id', $id)->first();
  }


  // remove item from wishlist and add to cart
  public function moveToCart($rowId)
  {
    $item = Cart::instance('wishlist')->get($rowId);
    Cart::instance('wishlist')->remove($rowId);
    Cart::instance('cart')->add($item->id, $item->name, 1, $item->price)->associate('App\Models\Product');
    session()->flash('moved-to-cart', 'Item has been moved to your shopping cart!');
    $this->dispatch('addedToCart')->to(Minicart::class);
  }

  // remove item from wishlist
  public function removeFromWishlist($rowId)
  {
    Cart::instance('wishlist')->remove($rowId);
    session()->flash('removed', 'Item removed from wishlist!');
    $this->dispatch('addedToWishList')->to(Miniwishlist::class);
  }

  public function render()
  {
    if (Auth::check()) {
      Cart::instance('cart')->store(Auth::user()->id);
    }
    return view('livewire.frontend.wishlist');
  }
}

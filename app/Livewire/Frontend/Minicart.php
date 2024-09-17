<?php

namespace App\Livewire\Frontend;

use Livewire\Component;
use Livewire\Attributes\On;
use Gloudemans\Shoppingcart\Facades\Cart;

class Minicart extends Component
{
  protected $listeners = ['addedToCart' => '$refresh'];


  public function destroy($rowId)
  {
    Cart::instance('cart')->remove($rowId);
    session()->flash('removed', 'Item removed from cart!');
  }


  public function setAmountForCheckout()
  {
    if (!Cart::instance('cart')->count() > 0) {
      session()->forget('checkout');
      return;
    }

    session()->put('checkout', [
      'discount' => 0,
      'subtotal' => Cart::instance('cart')->subtotal(),
      'tax' => Cart::instance('cart')->tax(),
      'total' => Cart::instance('cart')->total()
    ]);
  }

  public function render()
  {
    $this->setAmountForCheckout();
    return view('livewire.frontend.minicart');
  }
}

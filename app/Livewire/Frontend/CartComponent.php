<?php

namespace App\Livewire\Frontend;

use Carbon\Carbon;
use App\Models\Coupon;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Gloudemans\Shoppingcart\Facades\Cart;


class CartComponent extends Component
{
  public $couponCode;
  public $discount;
  public $subtotalAfterDiscount;
  public $taxAfterDiscount;
  public $totalAfterDiscount;


  // increment cart quantity
  public function increment($rowId)
  {
    $product = Cart::instance('cart')->get($rowId);
    $qty = $product->qty + 1;
    Cart::instance('cart')->update($rowId, $qty);
    $this->dispatch('addedToCart')->to(Minicart::class);
  }

  // decrement cart quantity
  public function decrement($rowId)
  {
    $product = Cart::instance('cart')->get($rowId);
    $qty = $product->qty - 1;
    Cart::instance('cart')->update($rowId, $qty);
    $this->dispatch('addedToCart')->to(Minicart::class);
  }

  // remove item from cart
  public function remove($rowId)
  {
    Cart::instance('cart')->remove($rowId);
    session()->flash('removed', 'Item removed from cart!');
    $this->dispatch('addedToCart')->to(Minicart::class);
  }

  // remove all items from cart
  public function destroyCart()
  {
    Cart::instance('cart')->destroy();
    $this->dispatch('addedToCart')->to(Minicart::class);
  }


  // apply coupon code
  public function applyCouponCode()
  {

    $this->validate([
      'couponCode' => 'required'
    ]);

    $coupon = Coupon::where('code', $this->couponCode)->where('expiry_date', '>=', Carbon::today())
      ->where('cart_value', '<=', Cart::instance('cart')->subtotal())->first();

    if (!$coupon) {
      session()->flash('coupon_invalid', 'Coupon code is invalid!');
      return;
    }

    session()->put('coupon', [
      'code' => $coupon->code,
      'type' => $coupon->type,
      'value' => $coupon->value,
      'cart_value' => $coupon->cart_value,
    ]);
  }


  // calculate coupon discounts
  public function calculateDiscounts()
  {
    if (session()->has('coupon')) {
      if (session()->get('coupon')['type'] == 'fixed') {
        $this->discount = session()->get('coupon')['value'];
      } else {
        $this->discount = (Cart::instance('cart')->subtotal() * session()->get('coupon')['value']) / 100;
      }
      $this->subtotalAfterDiscount = Cart::instance('cart')->subtotal() - $this->discount;
      $this->taxAfterDiscount = ($this->subtotalAfterDiscount) * config('cart.tax') / 100;
      $this->totalAfterDiscount = $this->subtotalAfterDiscount + $this->taxAfterDiscount;
    }
  }

  // remove coupon
  public function removeCoupon()
  {
    session()->forget('coupon');
  }


  public function setAmountForCheckout()
  {
    if (!Cart::instance('cart')->count() > 0) {
      session()->forget('checkout');
      return;
    }

    if (session()->has('coupon')) {
      session()->put('checkout', [
        'discount' => $this->discount,
        'subtotal' => $this->subtotalAfterDiscount,
        'tax' => $this->taxAfterDiscount,
        'total' => $this->totalAfterDiscount
      ]);
    } else {
      session()->put('checkout', [
        'discount' => 0,
        'subtotal' => Cart::instance('cart')->subtotal(),
        'tax' => Cart::instance('cart')->tax(),
        'total' => Cart::instance('cart')->total()
      ]);
    }
  }

  public function render()
  {
    if (session()->has('coupon')) {
      if (Cart::instance('cart')->subtotal() < session()->get('coupon')['cart_value']) {
        session()->forget('coupon');
      } else {
        $this->calculateDiscounts();
      }
    }

    $this->setAmountForCheckout();

    if (Auth::check()) {
      Cart::instance('cart')->store(Auth::user()->id);
    }
    return view('livewire.frontend.cart-component');
  }
}

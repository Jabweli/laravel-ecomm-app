<?php

namespace App\Livewire\Frontend;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Shipping;
use App\Models\Transaction;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Gloudemans\Shoppingcart\Facades\Cart;

class CheckOutComponent extends Component
{
  public $ship_to_different;

  public $firstname;
  public $lastname;
  public $country;
  public $line1;
  public $line2;
  public $city;
  public $zipcode;
  public $state;
  public $mobile;
  public $email;
  public $company;
  public $order_notes;


  // shipping models
  public $shipping_firstname;
  public $shipping_lastname;
  public $shipping_country;
  public $shipping_line1;
  public $shipping_line2;
  public $shipping_city;
  public $shipping_zipcode;
  public $shipping_state;
  public $shipping_mobile;
  public $shipping_email;
  public $shipping_company;

  public $paymentmode;
  public $thankyou;

  // lifecycle operator
  public function updated($fields)
  {
    $this->validateOnly($fields, [
      'firstname' => 'required',
      'lastname' => 'required',
      'country' => 'required',
      'line1' => 'required',
      'city' => 'required',
      'zipcode' => 'required',
      'state' => 'required',
      'mobile' => 'required',
      'email' => 'required|email',
      'paymentmode' => 'required',
    ]);

    if ($this->ship_to_different) {
      $this->validateOnly($fields, [
        'shipping_firstname' => 'required',
        'shipping_lastname' => 'required',
        'shipping_country' => 'required',
        'shipping_line1' => 'required',
        'shipping_city' => 'required',
        'shipping_zipcode' => 'required',
        'shipping_state' => 'required',
        'shipping_mobile' => 'required',
        'shipping_email' => 'required|email',
      ]);
    }
  }

  public function placeOrder()
  {

    $this->validate([
      'firstname' => 'required',
      'lastname' => 'required',
      'country' => 'required',
      'line1' => 'required',
      'city' => 'required',
      'zipcode' => 'required',
      'state' => 'required',
      'mobile' => 'required',
      'email' => 'required|email',
      'paymentmode' => 'required',
    ]);

    if ($this->ship_to_different) {
      $this->validate([
        'shipping_firstname' => 'required',
        'shipping_lastname' => 'required',
        'shipping_country' => 'required',
        'shipping_line1' => 'required',
        'shipping_city' => 'required',
        'shipping_zipcode' => 'required',
        'shipping_state' => 'required',
        'shipping_mobile' => 'required',
        'shipping_email' => 'required|email',
      ]);
    }

    sleep(3);

    $order = new Order();
    $order->user_id = Auth::user()->id;
    $order->subtotal = session()->get('checkout')['subtotal'];
    $order->discount = session()->get('checkout')['discount'];
    $order->tax = session()->get('checkout')['tax'];
    $order->total = session()->get('checkout')['total'];
    $order->firstname = $this->firstname;
    $order->lastname = $this->lastname;
    $order->country = $this->country;
    $order->line1 = $this->line1;
    $order->line2 = $this->line2;
    $order->city = $this->city;
    $order->zipcode = $this->zipcode;
    $order->province = $this->state;
    $order->mobile = $this->mobile;
    $order->email = $this->email;
    $order->company = $this->company;
    $order->order_notes = $this->order_notes;
    $order->status = 'ordered';
    $order->is_shipping_different = $this->ship_to_different ? 1 : 0;
    $order->save();

    session()->put('order_id', $order->id);

    foreach (Cart::instance('cart')->content() as $item) {
      $orderItem = new OrderItem();
      $orderItem->product_id = $item->id;
      $orderItem->order_id = $order->id;
      $orderItem->price = $item->price;
      $orderItem->quantity = $item->qty;
      $orderItem->save();
    }

    if ($this->ship_to_different) {
      $shipping = new Shipping();
      $shipping->order_id = $order->id;
      $shipping->firstname = $this->shipping_firstname;
      $shipping->lastname = $this->shipping_lastname;
      $shipping->country = $this->shipping_country;
      $shipping->line1 = $this->shipping_line1;
      $shipping->line2 = $this->shipping_line2;
      $shipping->city = $this->shipping_city;
      $shipping->zipcode = $this->shipping_zipcode;
      $shipping->province = $this->shipping_state;
      $shipping->mobile = $this->shipping_mobile;
      $shipping->email = $this->shipping_email;
      $shipping->company = $this->shipping_company;
      $shipping->save();
    }

    if ($this->paymentmode == 'cod') {
      $this->makeTransaction($order->id, 'pending');
      $this->resetCart();
    } else if ($this->paymentmode == 'paypal') {
      //redirect to paypal checkout page
      return redirect('payment/paypal');
    }
  }


  public function resetCart()
  {
    $this->thankyou = 1;
    Cart::instance('cart')->destroy();
    session()->forget('checkout');
  }

  public function makeTransaction($order_id, $status)
  {
    $transaction = new Transaction();
    $transaction->user_id = Auth::user()->id;
    $transaction->order_id = $order_id;
    $transaction->mode = $this->paymentmode;
    $transaction->status = $status;
    $transaction->save();
  }


  public function verifyForCheckout()
  {
    if (!Auth::check()) {
      return redirect()->route('login');
    } else if ($this->thankyou) {
      return redirect()->route('thank-you');
    } else if (!session()->get('checkout')) {
      return redirect()->route('product.cart');
    }
  }

  public function render()
  {
    $this->verifyForCheckout();
    return view('livewire.frontend.check-out-component');
  }
}

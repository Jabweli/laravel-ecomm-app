<?php

namespace App\Livewire\Admin\Product;

use App\Models\Coupon;
use Livewire\Component;

class Coupons extends Component
{
  public function render()
  {
    $coupons = Coupon::all();
    return view('livewire.admin.product.coupons', ['coupons' => $coupons]);
  }

  public $code;
  public $type;
  public $value;
  public $cart_value;
  public $expiry_date;

  public $edit_code;
  public $edit_type;
  public $edit_value;
  public $edit_cart_value;
  public $coupon_id;
  public $edit_expiry_date;


  // lifecyle hook method
  public function updated($fields)
  {
    $this->validateOnly($fields, [
      'code' => 'required|unique:coupons',
      'type' => 'required',
      'value' => 'required|numeric',
      'cart_value' => 'required|numeric',
      'expiry_date' => 'required'
    ]);
  }

  // store coupon
  public function store()
  {
    $this->validate([
      'code' => 'required|unique:coupons',
      'type' => 'required',
      'value' => 'required|numeric',
      'cart_value' => 'required|numeric',
      'expiry_date' => 'required'
    ]);

    sleep(2);
    $coupon = new Coupon();
    $coupon->code = $this->code;
    $coupon->type = $this->type;
    $coupon->value = $this->value;
    $coupon->cart_value = $this->cart_value;
    $coupon->expiry_date = $this->expiry_date;
    $coupon->save();
    session()->flash('saved', 'Coupon has been created successfully!');
    $this->reset(['code', 'value', 'cart_value']);
  }


  // fetch coupon for update
  public function fetch($coupon_id)
  {
    $coupon = Coupon::where('id', $coupon_id)->first();
    if ($coupon) {
      $this->coupon_id = $coupon->id;
      $this->edit_code = $coupon->code;
      $this->edit_type = $coupon->type;
      $this->edit_value = $coupon->value;
      $this->edit_cart_value = $coupon->cart_value;
      $this->edit_expiry_date = $coupon->expiry_date;
    }
  }

  // update coupon
  public function update($coupon_id)
  {

    sleep(2);
    $coupon = Coupon::where('id', $coupon_id)->first();
    if ($coupon) {
      $coupon->code = $this->edit_code;
      $coupon->type = $this->edit_type;
      $coupon->value = $this->edit_value;
      $coupon->cart_value = $this->edit_cart_value;
      $coupon->expiry_date = $this->edit_expiry_date;
      $coupon->save();
      session()->flash('updated', 'Coupon has been updated successfully!');
    }
  }

  // delete coupon
  public function delete($coupon_id)
  {
    $coupon = Coupon::where('id', $coupon_id)->first();
    if ($coupon) {
      $coupon->delete();
      session()->flash('deleted', 'Coupon has been deleted successfully!');
    }
  }
}

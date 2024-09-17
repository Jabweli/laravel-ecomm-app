<?php

namespace App\Livewire\Admin\Product;

use App\Models\Order;
use Livewire\Component;

class OrderView extends Component
{
  public $order;

  public function mount($id)
  {
    $this->order = Order::where('id', $id)->first();
  }

  public function render()
  {
    return view('livewire.admin.product.order-view')->extends('layouts.admin');
  }
}

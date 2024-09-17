<?php

namespace App\Livewire\Admin\Product;

use App\Models\Order;
use Livewire\Component;
use Livewire\WithPagination;

class Orders extends Component
{
  use WithPagination;
  protected $paginationTheme = 'bootstrap';

  public function render()
  {
    $orders = Order::paginate(20);
    return view('livewire.admin.product.orders', [
      'orders' => $orders
    ]);
  }
}

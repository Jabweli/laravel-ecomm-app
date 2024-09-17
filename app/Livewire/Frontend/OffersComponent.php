<?php

namespace App\Livewire\Frontend;

use App\Models\Product;
use Livewire\Component;

class OffersComponent extends Component
{
  public function render()
  {
    $offers = Product::where('set_as', 'offer')->take(5)->get();
    return view('livewire.frontend.offers-component', ['offers' => $offers]);
  }
}

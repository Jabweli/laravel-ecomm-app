<?php

namespace App\Livewire\Frontend;

use Livewire\Component;

class Miniwishlist extends Component
{
  protected $listeners = ['addedToWishList' => '$refresh'];

  public function render()
  {
    return view('livewire.frontend.miniwishlist');
  }
}

<?php

namespace App\Livewire\Frontend;

use App\Models\Newsletter as ModelsNewsletter;
use Livewire\Component;

class Newsletter extends Component
{
  public function render()
  {
    return view('livewire.frontend.newsletter');
  }

  public $email;

  public function save()
  {
    $this->validate([
      'email' => 'email|required|max:255'
    ]);
    sleep(2);
    ModelsNewsletter::create([
      'email' => $this->email
    ]);

    session()->flash('saved', 'Thank you! You have subscribed to our newsletter.');
    $this->reset('email');
  }
}

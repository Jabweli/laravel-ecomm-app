<?php

namespace App\Livewire\Admin\Settings;

use App\Models\Policy;
use Livewire\Component;

class Terms extends Component
{
  public $policy;

  public function mount()
  {
    $this->policy = Policy::where('id', 1)->first();
  }

  public $terms;
  public function submit()
  {
    sleep(3);
    $term = Policy::where('id', 1)->first();
    if ($term) {
      $term->update([
        'terms' => $this->terms
      ]);

      session()->flash('saved', 'Saved successfully!');
      $this->mount();
    } else {
      Policy::create([
        'terms' => $this->terms
      ]);
      session()->flash('saved', 'Saved successfully!');
      $this->mount();
    }
  }

  public function render()
  {
    return view('livewire.admin.settings.terms');
  }
}

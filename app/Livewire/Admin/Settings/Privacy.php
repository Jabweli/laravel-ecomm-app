<?php

namespace App\Livewire\Admin\Settings;

use App\Models\Policy;
use Livewire\Component;

class Privacy extends Component
{
  public $privacy;

  public function mount()
  {
    $this->privacy = Policy::where('id', 1)->first();
  }

  public $policy;
  public function submit()
  {
    sleep(3);
    $privacy = Policy::where('id', 1)->first();
    if ($privacy) {
      $privacy->update([
        'policy' => $this->policy
      ]);

      session()->flash('saved', 'Saved successfully!');
      $this->mount();
    } else {
      Policy::create([
        'policy' => $this->policy
      ]);
      session()->flash('saved', 'Saved successfully!');
      $this->mount();
    }
  }

  public function render()
  {
    return view('livewire.admin.settings.privacy');
  }
}

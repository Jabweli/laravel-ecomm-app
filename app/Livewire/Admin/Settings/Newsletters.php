<?php

namespace App\Livewire\Admin\Settings;

use Livewire\Component;
use App\Models\Newsletter;

class Newsletters extends Component
{
  public $emails;

  public function render()
  {
    return view('livewire.admin.settings.newsletters');
  }

  public function mount()
  {
    $this->emails = Newsletter::orderBy('id', 'DESC')->get();
  }

  // delete newsletter email
  public function delete($id)
  {
    $email = Newsletter::where('id', $id)->first();

    if ($email) {
      $email->delete();
      session()->flash('deleted', 'Newsletter email deleted successfully!');
      $this->mount();
    } else {
      session()->flash('failed', 'Something wrong happened, try again!');
    }
  }
}

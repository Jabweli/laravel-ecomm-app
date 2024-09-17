<?php

namespace App\Livewire\Admin\Settings;

use App\Models\Message;
use Livewire\Component;

class Messages extends Component
{
  public $messages;

  // fetch model
  public $name;
  public $subject;
  public $email;
  public $body;
  public $phone;

  public function render()
  {
    return view('livewire.admin.settings.messages');
  }


  public function mount()
  {
    $this->messages = Message::orderby('id', 'DESC')->get();
  }



  // fetch message
  public function fetch($id)
  {
    $message = Message::where('id', $id)->first();

    if ($message) {
      $this->name = $message->name;
      $this->email = $message->email;
      $this->subject = $message->subject;
      $this->body = $message->body;
      $this->phone = $message->phone;
    }
  }

  // delete message
  public function delete($id)
  {
    $message = Message::where('id', $id)->first();

    if ($message) {
      $message->delete();
      $this->mount();
      session()->flash('msgdeleted', 'Message deleted successfully!');
    } else {
      session()->flash('failed', 'Something wrong happened, try again!');
      $this->mount();
    }
  }
}

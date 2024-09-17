<?php

namespace App\Livewire\Frontend;

use App\Models\Message;
use Livewire\Component;

class ContactComponent extends Component
{
  public function render()
  {
    return view('livewire.frontend.contact-component');
  }

  public $name;
  public $phone;
  public $email;
  public $subject;
  public $message;

  public function submit()
  {
    $this->validate([
      'name' => 'required|string|max:255',
      'phone' => 'required|max:20',
      'email' => 'email|required|string|max:255',
      'subject' => 'required|string',
      'message' => 'required|string'
    ]);

    sleep(2);

    Message::create([
      'name' => $this->name,
      'email' => $this->email,
      'phone' => $this->phone,
      'subject' => $this->subject,
      'body' => $this->message
    ]);

    session()->flash('sent', 'Thank you! Your message has been sent.');
    $this->reset(['name', 'email', 'phone', 'subject', 'message']);
  }
}

<?php

namespace App\Livewire\User;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class Details extends Component
{
  public function render()
  {
    return view('livewire.user.details');
  }

  public $current_password;
  public $password;
  public $password_confirmation;

  // change password
  public function changePassword()
  {

    $this->validate([
      'current_password' => 'required',
      'password' => 'required|confirmed|min:8|different:current_password',
    ]);

    sleep(2);

    $user = User::where('id', Auth::user()->id)->first();

    if (Hash::check($this->current_password, $user->password)) {

      $user->password = Hash::make($this->password);
      $user->save();

      $this->reset(['current_password', 'password', 'password_confirmation']);
      session()->flash('password_success', 'Password has been changed successfully!');
    } else {
      session()->flash('password_error', 'Password does not match !');
    }
  }
}

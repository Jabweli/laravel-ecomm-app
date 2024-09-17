<?php

namespace App\Livewire\Admin\Settings;

use App\Models\Setting;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\File;

class Websettings extends Component
{
  public $name;
  public $url;
  public $logo;
  public $phone;
  public $email;
  public $address;
  public $facebook;
  public $insta;
  public $twitter;

  public $currentlogo;

  public function render()
  {
    return view('livewire.admin.settings.websettings');
  }

  public function mount()
  {
    $settings = Setting::where('id', '1')->first();

    if ($settings) {
      $this->name = $settings->name;
      $this->url = $settings->url;
      $this->currentlogo = $settings->logo;
      $this->phone = $settings->phone;
      $this->email = $settings->email;
      $this->address = $settings->address;
      $this->facebook = $settings->facebook;
      $this->insta = $settings->instagram;
      $this->twitter = $settings->twitter;
    }
  }

  use WithFileUploads;

  public function save()
  {
    $settings = Setting::where('id', '1')->first();

    $this->validate([
      'email' => 'email|max:255'
    ]);

    if ($settings) {
      if (!$this->logo == null) {
        $destination = 'storage/photos/' . $settings->logo;
        if (File::exists($destination)) {
          File::delete($destination);
        }

        $filename = 'logo' . '.' . 'png';
        $this->logo->storeAs('photos', $filename, 'public');

        $settings->update([
          'name' => $this->name,
          'url' => $this->url,
          'logo' => $filename,
          'phone' => $this->phone,
          'email' => $this->email,
          'address' => $this->address,
          'facebook' => $this->facebook,
          'instagram' => $this->insta,
          'twitter' => $this->twitter,
        ]);
      } else {
        $settings->update([
          'name' => $this->name,
          'url' => $this->url,
          'phone' => $this->phone,
          'email' => $this->email,
          'address' => $this->address,
          'facebook' => $this->facebook,
          'instagram' => $this->insta,
          'twitter' => $this->twitter,
        ]);
      }

      $this->mount();
      session()->flash('settings', 'Settings saved successfully!');
    } else {

      if ($this->logo) {
        $filename = 'logo' . '.' . 'png';
        $this->logo->storeAs('photos', $filename, 'public');
      } else {
        $filename = "";
      }


      Setting::create([
        'name ' => $this->name,
        'url' => $this->url,
        'logo' => $filename,
        'phone' => $this->phone,
        'email' => $this->email,
        'address' => $this->address,
        'facebook' => $this->facebook,
        'instagram' => $this->insta,
        'twitter' => $this->twitter,
      ]);
      $this->mount();
      session()->flash('settings', 'Settings saved successfully!');
    }
  }
}

<?php

namespace App\Livewire\Admin\Settings;

use Livewire\Component;
use App\Models\Testimony;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\File;

class Testimonies extends Component
{
  public function render()
  {
    return view('livewire.admin.settings.testimonies');
  }

  public $testimonies;

  public $name;
  public $profession;
  public $image;
  public $testimony;

  public $edit_name;
  public $edit_profession;
  public $edit_image;
  public $edit_testimony;
  public $testimony_id;
  public $new_image;



  public function mount()
  {
    $this->testimonies = Testimony::orderBy('id', 'DESC')->get();
  }

  use WithFileUploads;

  public function addTestimony()
  {
    $this->validate([
      'name' => 'required|string',
      'profession' => 'required',
      'image' => 'image|required|max:2048|mimes:jpg,png,jpeg,webp',
      'testimony' => 'required|string',
    ]);

    sleep(2);
    $filename = time() . 'png';
    $this->image->storeAs('clients', $filename, 'public');

    Testimony::create([
      'name' => $this->name,
      'profession' => $this->profession,
      'image' => $filename,
      'body' => $this->testimony,
    ]);

    session()->flash('testimonyAdded', 'Client testimony added successfully!');
    $this->reset(['name', 'profession', 'image', 'testimony']);
    $this->mount();
  }


  // fetch testimony to be edited
  public function fetch($id)
  {
    $testimony = Testimony::where('id', $id)->first();

    if ($testimony) {
      $this->testimony_id = $testimony->id;
      $this->edit_name = $testimony->name;
      $this->edit_profession = $testimony->profession;
      $this->edit_image = $testimony->image;
      $this->edit_testimony = $testimony->body;
    }
  }


  // update client testimony
  public function update($id)
  {
    $this->validate([
      'edit_name' => 'required|string',
      'edit_profession' => 'required',
      'edit_testimony' => 'required|string',
    ]);

    sleep(2);

    $testimony = Testimony::where('id', $id)->first();

    if ($testimony) {

      // check if profile pic is uploaded
      if (isset($this->new_image)) {
        $destination = 'storage/clients/' . $testimony->image;
        if (File::exists($destination)) {
          File::delete($destination);
        }

        $filename = time() . 'png';
        $this->new_image->storeAs('clients', $filename, 'public');

        $testimony->update([
          'name' => $this->edit_name,
          'profession' => $this->edit_profession,
          'image' => $filename,
          'body' => $this->edit_testimony,
        ]);
      } else {
        $testimony->update([
          'name' => $this->edit_name,
          'profession' => $this->edit_profession,
          'body' => $this->edit_testimony,
        ]);
      }
    }


    session()->flash('updated', 'Client Testimony updated successfully!');
    $this->reset(['edit_name', 'edit_profession', 'new_image', 'edit_testimony']);
    $this->dispatch('testimonyUpdated');
    $this->mount();
  }


  // delete client testimony
  public function delete($id)
  {
    $testimony = Testimony::where('id', $id)->first();

    if ($testimony) {
      $destination = 'storage/clients/' . $testimony->image;
      if (File::exists($destination)) {
        File::delete($destination);
      }

      $testimony->delete();
      $this->mount();
      session()->flash('deleted', 'Client testimony deleted successfully!');
    }
  }
}

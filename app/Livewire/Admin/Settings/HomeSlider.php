<?php

namespace App\Livewire\Admin\Settings;

use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use App\Models\ProductCategory;
use Illuminate\Support\Facades\File;
use App\Models\HomeSlider as ModelsHomeSlider;

class HomeSlider extends Component
{
  use WithPagination;
  protected $paginationTheme = 'bootstrap';

  public function render()
  {
    $slides = ModelsHomeSlider::paginate(10);
    return view('livewire.admin.settings.home-slider', ['slides' => $slides]);
  }


  public $top_title;
  public $title;
  public $subtitle;
  public $offer;
  public $link;
  public $image;
  public $status;

  use WithFileUploads;

  public function save()
  {

    $this->validate([
      'top_title' => 'required|string',
      'title' => 'required',
      'subtitle' => 'required',
      'offer' => 'required',
      'link' => 'required',
      'image' => 'required',
      'status' => 'required'
    ]);

    sleep(2);

    if (isset($this->image)) {
      $this->validate([
        'image' => 'image|max:2048|mimes:jpg,png,jpeg,webp,avif',
      ]);
      $filename = time() . 'png';
    } else {
      $filename = '';
    }

    $this->image->storeAs('slides', $filename, 'public');

    ModelsHomeSlider::create([
      'top_title' => $this->top_title,
      'image' => $filename,
      'title' => $this->title,
      'sub_title' => $this->subtitle,
      'offer' => $this->offer,
      'link' => $this->link,
      'status' => $this->status
    ]);

    session()->flash('saved', 'Slide has been added successfully!');
    $this->reset(['top_title', 'title', 'subtitle', 'offer', 'link', 'image']);
  }


  public $edit_top_title;
  public $edit_title;
  public $edit_subtitle;
  public $edit_offer;
  public $edit_link;
  public $edit_image;
  public $edit_status;
  public $slide_id;
  public $current_img;


  public function edit($id)
  {
    $slide = ModelsHomeSlider::where('id', $id)->first();

    if ($slide) {
      $this->slide_id = $slide->id;
      $this->edit_top_title = $slide->top_title;
      $this->edit_title = $slide->title;
      $this->edit_subtitle = $slide->sub_title;
      $this->edit_offer = $slide->offer;
      $this->edit_link = $slide->link;
      $this->edit_status = $slide->status;
      $this->current_img = $slide->image;
    }
  }


  // update
  public function update($id)
  {
    sleep(2);
    $slide = ModelsHomeSlider::where('id', $id)->first();

    if ($slide) {

      if (isset($this->edit_image)) {
        $destination = 'storage/slides/' . $slide->image;
        if (File::exists($destination)) {
          File::delete($destination);
        }

        $filename = time() . 'png';
        $this->edit_image->storeAs('slides', $filename, 'public');

        $slide->update([
          'top_title' => $this->edit_top_title,
          'image' => $filename,
          'title' => $this->edit_title,
          'sub_title' => $this->edit_subtitle,
          'offer' => $this->edit_offer,
          'link' => $this->edit_link,
          'status' => $this->edit_status
        ]);

        session()->flash('updated', 'Slide has been updated successfully!');
      } else {
        $slide->update([
          'top_title' => $this->edit_top_title,
          'title' => $this->edit_title,
          'sub_title' => $this->edit_subtitle,
          'offer' => $this->edit_offer,
          'link' => $this->edit_link,
          'status' => $this->edit_status
        ]);
        session()->flash('updated', 'Slide has been updated successfully!');
      }
    }
  }


  // delete category
  public function delete($id)
  {
    $slide = ModelsHomeSlider::where('id', $id)->first();

    if ($slide) {
      $destination = 'storage/slides/' . $slide->image;
      if (File::exists($destination)) {
        File::delete($destination);
      }

      $slide->delete();
      session()->flash('deleted', 'Slide deleted successfully!');
    }
  }
}

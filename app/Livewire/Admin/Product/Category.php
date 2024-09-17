<?php

namespace App\Livewire\Admin\Product;

use Livewire\Component;
use Illuminate\Support\Str;
use App\Models\ProductCategory;
use Illuminate\Support\Facades\File;
use Livewire\Features\SupportFileUploads\WithFileUploads;
use Livewire\WithPagination;

class Category extends Component
{
  use WithPagination;
  protected $paginationTheme = 'bootstrap';
  public function render()
  {
    return view('livewire.admin.product.category', [
      'categories' => ProductCategory::paginate(10),
    ]);
  }


  public $name;
  public $image;
  public $desc;
  public $status;

  use WithFileUploads;

  public function save()
  {

    $this->validate([
      'name' => 'required|string',
      'desc' => 'string|nullable',
      'status' => 'required|integer'
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

    $cat = ProductCategory::where('name', $this->name)->first();

    if ($cat) {
      session()->flash('error', 'This category name already exists!');
    } else {
      $this->image->storeAs('categories', $filename, 'public');

      ProductCategory::create([
        'name' => $this->name,
        'slug' => Str::slug($this->name),
        'image' => $filename,
        'description' => $this->desc,
        'status' => $this->status
      ]);

      session()->flash('saved', 'Category added successfully!');
      $this->reset(['name', 'image', 'desc']);
    }
  }


  public $edit_name;
  public $edit_image;
  public $edit_desc;
  public $edit_status;
  public $current_img;
  public $cat_id;


  public function edit($id)
  {
    $cat = ProductCategory::where('id', $id)->first();

    if ($cat) {
      $this->cat_id = $cat->id;
      $this->edit_name = $cat->name;
      $this->edit_desc = $cat->description;
      $this->edit_status = $cat->status;
      $this->current_img = $cat->image;
    }
  }


  // update
  public function update($id)
  {
    sleep(2);
    $cat = ProductCategory::where('id', $id)->first();

    if ($cat) {

      if (isset($this->edit_image)) {
        $destination = 'storage/categories/' . $cat->image;
        if (File::exists($destination)) {
          File::delete($destination);
        }

        $filename = time() . 'png';
        $this->edit_image->storeAs('categories', $filename, 'public');

        $cat->update([
          'name' => $this->edit_name,
          'slug' => Str::slug($this->edit_name),
          'image' => $filename,
          'description' => $this->edit_desc,
          'status' => $this->edit_status
        ]);

        session()->flash('updated', 'Category updated successfully!');
      } else {
        $cat->update([
          'name' => $this->edit_name,
          'slug' => Str::slug($this->edit_name),
          'description' => $this->edit_desc,
          'status' => $this->edit_status
        ]);
        session()->flash('updated', 'Category updated successfully!');
      }
    }
  }



  // delete category
  public function delete($id)
  {
    $cat = ProductCategory::where('id', $id)->first();

    if ($cat) {
      $destination = 'storage/categories/' . $cat->image;
      if (File::exists($destination)) {
        File::delete($destination);
      }

      $cat->delete();
      session()->flash('deleted', 'Category deleted successfully!');
    }
  }
}

<?php

namespace App\Livewire\Admin\Post;

use Livewire\Component;
use Illuminate\Support\Str;
use App\Models\PostCategory as ModelsCategory;

class PostCategory extends Component
{
  public $categories;
  public $cat_id;

  public $title;
  public $desc;
  public $status;

  public $edit_title;
  public $edit_desc;
  public $edit_status;

  public function render()
  {
    return view('livewire.admin.post.post-category');
  }



  public function mount()
  {
    $this->categories = ModelsCategory::all();
  }


  public function category()
  {
    $this->validate([
      'title' => 'required|string',
      'status' => 'required'
    ]);

    sleep(2);

    // check if category is already added
    $category = ModelsCategory::where('name', $this->title)->first();

    if ($category) {
      session()->flash('error', 'Category already added!');
    } else {

      ModelsCategory::create([
        'name' => $this->title,
        'slug' => Str::slug($this->title),
        'description' => $this->desc,
        'status' => $this->status
      ]);

      session()->flash('category', 'Category added successfully!');
      $this->reset(['title', 'desc']);
      $this->mount();
    }
  }


  public function delete($id)
  {
    $category = ModelsCategory::where('id', $id)->first();

    if ($category) {
      $category->delete();
      $this->mount();
      session()->flash('catDeleted', 'Category deleted successfully!');
    }
  }


  public function edit($id)
  {
    $category = ModelsCategory::where('id', $id)->first();

    if ($category) {
      $this->cat_id = $category->id;
      $this->edit_title = $category->name;
      $this->edit_desc = $category->description;
      $this->edit_status = $category->status;
    }
  }


  public function update($id)
  {
    $this->validate([
      'edit_title' => 'required|string',
      'edit_status' => 'required'
    ]);

    sleep(2);

    $category = ModelsCategory::where('id', $id)->first();

    if ($category) {

      $category->update([
        'name' => $this->edit_title,
        'slug' => Str::slug($this->edit_title),
        'description' => $this->edit_desc,
        'status' => $this->edit_status
      ]);
    }

    session()->flash('catUpdated', 'Category updated successfully!');
    $this->mount();
  }
}

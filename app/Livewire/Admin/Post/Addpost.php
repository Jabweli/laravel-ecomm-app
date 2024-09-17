<?php

namespace App\Livewire\Admin\Post;

use App\Models\Post;
use App\Models\PostCategory;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;

class Addpost extends Component
{
  public $title;
  public $image;
  public $category;
  public $short_desc;
  public $long_desc;
  public $categories;

  public function mount()
  {
    $this->categories = PostCategory::all();
  }


  public function render()
  {
    return view('livewire.admin.post.addpost');
  }



  use WithFileUploads;

  public function post()
  {
    $this->validate([
      'title' => 'required|string',
      'category' => 'required',
      'image' => 'image|required|max:2048|mimes:jpg,png,jpeg,webp,avif',
      'short_desc' => 'required|string',
      'long_desc' => 'required|string'
    ]);


    sleep(2);
    $filename = time() . 'png';
    $this->image->storeAs('posts', $filename, 'public');

    Post::create([
      'title' => $this->title,
      'category_id' => $this->category,
      'image' => $filename,
      'slug' => Str::slug($this->title),
      'short_desc' => $this->short_desc,
      'long_desc' => $this->long_desc
    ]);

    session()->flash('posts', 'Post added successfully!');
    $this->reset(['title', 'category', 'image', 'short_desc', 'long_desc']);
    return redirect('admin/posts')->with('posts', 'Post added successfully!');
  }
}

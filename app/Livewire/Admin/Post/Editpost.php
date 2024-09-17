<?php

namespace App\Livewire\Admin\Post;

use App\Models\Post;
use App\Models\PostCategory;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\File;

class Editpost extends Component
{
  public $post;
  public $categories;


  public $title;
  public $image;
  public $category;
  public $short_desc;
  public $longdesc;

  public function render()
  {
    return view('livewire.admin.post.editpost')->extends('layouts.admin');
  }


  public function mount($id)
  {
    $this->post = Post::where('id', $id)->first();
    $this->categories = PostCategory::all();
  }

  use WithFileUploads;

  public function update($id)
  {
    dd($id);
    $this->validate([
      'title' => 'required|string',
      'category' => 'required',
      'short_desc' => 'required|string',
      'longdesc' => 'required|string'
    ]);

    sleep(2);


    $post = Post::where('id', $id)->first();

    if ($post) {

      if (!$this->image == null) {
        $destination = 'storage/photos/' . $post->image;
        if (File::exists($destination)) {
          File::delete($destination);
        }

        $filename = time() . 'png';
        $this->image->storeAs('photos', $filename, 'public');

        $post->update([
          'title' => $this->title,
          'category_id' => $this->category,
          'slug' => Str::slug($this->title),
          'image' => $filename,
          'short_desc' => $this->short_desc,
          'long_desc' => $this->longdesc
        ]);
      } else {
        $post->update([
          'title' => $this->title,
          'category_id' => $this->category,
          'slug' => Str::slug($this->title),
          'short_desc' => $this->short_desc,
          'long_desc' => $this->longdesc
        ]);
      }
    }


    session()->flash('updated', 'Post updated successfully!');
    return redirect()->to('admin/posts');
  }
}

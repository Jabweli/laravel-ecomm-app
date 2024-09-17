<?php

namespace App\Livewire\Admin\Post;

use App\Models\Post;
use Livewire\Component;
use Illuminate\Support\Facades\File;

class Posts extends Component
{
  public $title;
  public $image;
  public $category;
  public $short_desc;
  public $long_desc;
  public $posts;
  public $post_id;
  public $currentImage;


  public function render()
  {
    return view('livewire.admin.post.posts');
  }


  public function mount()
  {
    $this->posts = Post::all();
  }



  public function delete($id)
  {
    $post = Post::where('id', $id)->first();

    if ($post) {
      $destination = 'storage/posts/' . $post->image;
      if (File::exists($destination)) {
        File::delete($destination);
      }

      $post->delete();
      $this->mount();
      session()->flash('deleted', 'Post deleted successfully!');
    }
  }
}

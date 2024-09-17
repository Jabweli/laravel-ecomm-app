<?php

namespace App\Livewire\Frontend;

use App\Models\Post;
use App\Models\PostCategory;
use Livewire\Component;
use Livewire\WithPagination;

class BlogComponent extends Component
{
  public $search;
  public $searchTerm;

  public function mount()
  {
    $this->fill(request()->only('search'));
    $this->searchTerm = '%' . $this->search . '%';
  }

  use WithPagination;
  public function render()
  {
    $posts = Post::where('title', 'LIKE', $this->searchTerm)->latest()->paginate(7);
    $categories = PostCategory::where('status', 1)->get();
    $trending_posts = Post::inRandomOrder()->take(5)->get();
    return view('livewire.frontend.blog-component', [
      'posts' => $posts,
      'categories' => $categories,
      'trending_posts' => $trending_posts,
    ]);
  }
}

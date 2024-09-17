<?php

namespace App\Livewire\Frontend;

use App\Models\Post;
use App\Models\PostCategory;
use Livewire\Component;
use Livewire\WithPagination;

class Postsbycategory extends Component
{
  public $slug;
  public $search;
  public $searchTerm;

  public function mount($slug)
  {
    $this->slug = $slug;

    $this->fill(request()->only('search'));
    $this->searchTerm = '%' . $this->search . '%';
  }

  use WithPagination;

  public function render()
  {
    $category = PostCategory::where('slug', $this->slug)->first();
    $posts = Post::where('title', 'LIKE', $this->searchTerm)->where('category_id', $category->id)->paginate(10);
    $categories = PostCategory::where('status', 1)->get();
    $trending_posts = Post::inRandomOrder()->take(5)->get();
    return view('livewire.frontend.postsbycategory', [
      'posts' => $posts,
      'categories' => $categories,
      'trending_posts' => $trending_posts,
      'category' => $category
    ])->extends('layouts.app');
  }
}

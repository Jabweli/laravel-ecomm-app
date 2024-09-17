<?php

namespace App\Livewire\Frontend;

use App\Models\Comment;
use App\Models\Post;
use Bookworm\Bookworm;
use Livewire\Component;
use App\Models\PostCategory;
use Illuminate\Support\Facades\Session;

class Singlepost extends Component
{
  public $slug;
  public $categories;

  public function mount($slug)
  {
    $this->slug = $slug;
    $this->categories = PostCategory::where('status', 1)->get();
  }


  public $name;
  public $comment;
  public $email;
  public $website;

  // submit comment
  public function comment($id)
  {
    dd($id);
  }

  public function render()
  {
    $post = Post::where('slug', $this->slug)->first();
    $trending_posts = Post::inRandomOrder()->where('slug', '!=', $this->slug)->take(5)->get();

    // get post reading time
    $time = Bookworm::estimate($post->long_desc, $units = [' minute', ' minutes']);

    // creating post share links
    $share = \Share::page(
      'https://www.positronx.io/create-autocomplete-search-in-laravel-with-typeahead-js/',
      'Your share text comes here',
    )
      ->facebook()
      ->twitter()
      ->linkedin()
      ->telegram()
      ->whatsapp();

    // increment view count
    if (!Session::has($this->slug)) {
      Post::where('slug', $this->slug)->increment('views');
      Session::put($this->slug, 1);
    }

    return view('livewire.frontend.singlepost', [
      'post' => $post,
      'time' => $time,
      'share' => $share,
      'trending_posts' => $trending_posts
    ])->extends('layouts.app');
  }
}

<?php

namespace App\Livewire\Frontend;

use App\Models\Post;
use App\Models\Comment;
use Livewire\Component;

class Commentform extends Component
{
  public function render()
  {
    return view('livewire.frontend.commentform');
  }

  // post parament
  public $post;

  // comment form models
  public $name;
  public $email;
  public $comment;
  public $website;

  public function submit($id)
  {

    $post = Post::where('id', $id)->first();

    if ($post) {

      $this->validate([
        'name' => 'required|string',
        'email' => 'required|email',
        'comment' => 'required|string'
      ]);

      sleep(2);

      Comment::create([
        'post_id' => $id,
        'name' => $this->name,
        'email' => $this->email,
        'comment' => $this->comment,
        'website' => $this->website
      ]);

      session()->flash('commentAdded', 'Comment has been submitted successfully!');
      $this->reset(['name', 'email', 'comment', 'website']);
    } else {
      session()->flash('failed', 'Sorry your comment could not be posted, try again');
    }
  }
}

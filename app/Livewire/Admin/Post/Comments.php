<?php

namespace App\Livewire\Admin\Post;

use App\Models\Comment;
use Livewire\Component;

class Comments extends Component
{
  protected $listeners = ['success' => '$refresh'];
  public $comments;

  public function mount()
  {
    $this->comments = Comment::all();
  }


  public function render()
  {
    return view('livewire.admin.post.comments');
  }


  public function approve($id)
  {
    $comment = Comment::where('id', $id)->first();
    if ($comment) {
      $comment->status = 'Approved';
      $comment->update();
      $this->mount();
      // $this->dispatch('success')->self();
      session()->flash('approved', "Comment approved successfully!");
    } else {
      session()->flash('failed', "Something wrong happened, try again!");
    }
  }


  public function disapprove($id)
  {
    $comment = Comment::where('id', $id)->first();
    if ($comment) {
      $comment->status = 'Disapproved';
      $comment->update();
      $this->mount();

      // $this->dispatch('success')->self();
      session()->flash('disapproved', "Comment disapproved successfully!");
    } else {
      session()->flash('failed', "Something wrong happened, try again!");
    }
  }

  public function delete($id)
  {
    $comment = Comment::where('id', $id)->first();
    if ($comment) {
      $comment->delete();
      $this->mount();

      session()->flash('deleted', "Comment deleted successfully!");
    } else {
      session()->flash('failed', "Something wrong happened, try again!");
    }
  }

  public $postComment;
  public function view($id)
  {
    $this->postComment = Comment::where('id', $id)->first();
  }
}

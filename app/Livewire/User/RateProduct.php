<?php

namespace App\Livewire\User;

use App\Models\Review;
use App\Models\Product;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class RateProduct extends Component
{

   public $product;
   public $product_id;

   public function mount($id)
   {
      $this->product = Product::where('id', $id)->first();
      $this->product_id = $this->product->id;
   }


   public $rating;
   public $title;
   public $comment;
   

   public function rate(){

      $this->validate([
         'rating' => 'required'
      ]);

      sleep(2);

      $review = new Review();
      $review->user_id = Auth::user()->id;
      $review->product_id = $this->product_id;
      $review->rating = $this->rating;
      $review->title = $this->title;
      $review->comment = $this->comment;
      $review->save();

      $this->reset(['title', 'comment']);
      session()->flash('reviewed', 'Thank you, your review has been submitted successfully!');
   }

   public function render()
   {
      return view('livewire.user.rate-product')->extends('layouts.user');
   }
}

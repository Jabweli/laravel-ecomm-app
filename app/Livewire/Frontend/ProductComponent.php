<?php

namespace App\Livewire\Frontend;

use App\Models\Product;
use Livewire\Component;
use App\Models\ProductCategory;
use App\Models\RecentView;
use Illuminate\Support\Facades\Auth;
use Gloudemans\Shoppingcart\Facades\Cart;

class ProductComponent extends Component
{
  public $product;
  public $related_products;
  public $new_products;
  public $categories;

  public function mount($slug)
  {
    $this->product = Product::where('slug', $slug)->first();
    $this->categories = ProductCategory::where('status', 1)->get();

    if ($this->product) {
      $this->related_products = Product::latest()->where('cat_id', $this->product->cat_id)
        ->where('id', '!=', $this->product->id)->take(4)->get();

      $this->new_products = Product::latest()->where('id', '!=', $this->product->id)->take(3)->get();
    }

    // record product view by user
    if (Auth::check()) {
      $view = RecentView::where('user_id', Auth::user()->id)->where('product_id', $this->product->id)->first();
      if (!$view) {
        RecentView::create([
          'user_id' => Auth::user()->id,
          'product_id' => $this->product->id
        ]);
      }
    }
  }

  public $quick_pdt;
  public function quickView($id)
  {
    $this->quick_pdt = Product::where('id', $id)->first();
  }


  // add to cart
  public $qty = 1;
  public function store($product_id, $product_name, $product_price)
  {
    Cart::instance('cart')->add($product_id, $product_name, $this->qty, $product_price)->associate('App\Models\Product');
    $this->dispatch('added-to-cart');
    $this->qty = 1;
    $this->dispatch('addedToCart')->to(Minicart::class);
  }


  // add to wishList
  public function addToWishList($product_id, $product_name, $product_price)
  {

    Cart::instance('wishlist')->add($product_id, $product_name, 1, $product_price)->associate('App\Models\Product');
    $this->dispatch('addedToWishList')->self();
    $this->dispatch('addedToWishList')->to(Miniwishlist::class);
  }

  public function render()
  {
    if (Auth::check()) {
      Cart::instance('cart')->store(Auth::user()->id);
      Cart::instance('wishlist')->store(Auth::user()->id);
    }
    return view('livewire.frontend.product-component')->extends('layouts.app');
  }
}

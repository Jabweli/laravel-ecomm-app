<?php

namespace App\Livewire\Frontend;

use App\Models\Product;
use Livewire\Component;
use App\Models\HomeSlider;
use App\Models\Newsletter;
use App\Models\ProductCategory;
use Illuminate\Support\Facades\Auth;
use Gloudemans\Shoppingcart\Facades\Cart;

class HomeComponent extends Component
{
  public $featured_products;
  public $categories;
  public $new_products;
  public $popular_products;
  public $slides;

  public function mount()
  {
    $this->featured_products = Product::where('set_as', 'featured')->take(8)->get();
    $this->categories = ProductCategory::where('status', 1)->get();
    $this->new_products = Product::inRandomOrder()->latest()->take(8)->get();
    $this->popular_products = Product::inRandomOrder()->take(8)->get();
    $this->slides = HomeSlider::all();
  }

  public $quick_pdt;
  public function quickView($id)
  {
    $this->quick_pdt = Product::where('id', $id)->first();
    $this->mount();
  }


  // add to cart
  public function store($product_id, $product_name, $product_price)
  {
    Cart::instance('cart')->add($product_id, $product_name, 1, $product_price)->associate('App\Models\Product');
    $this->dispatch('addedToCart')->self();
    $this->dispatch('addedToCart')->to(Minicart::class);

    if (Auth::check()) {
      Cart::instance('cart')->store(Auth::user()->id);
    }
  }

  // add to wishList
  public function addToWishList($product_id, $product_name, $product_price)
  {
    Cart::instance('wishlist')->add($product_id, $product_name, 1, $product_price)->associate('App\Models\Product');
    $this->dispatch('addedToWishList')->self();
    $this->dispatch('addedToWishList')->to(Miniwishlist::class);

    if (Auth::check()) {
      Cart::instance('wishlist')->store(Auth::user()->id);
    }
  }

  // newsletter
  public $email;

  public function newsletter()
  {
    $this->validate([
      'email' => 'email|required|max:255'
    ]);
    sleep(2);
    Newsletter::create([
      'email' => $this->email
    ]);

    session()->flash('saved', 'Thank you! You have subscribed to our newsletter.');
    $this->reset('email');
  }

  public function render()
  {
    if (Auth::check()) {
      Cart::instance('cart')->restore(Auth::user()->id);
      Cart::instance('wishlist')->restore(Auth::user()->id);
    }
    return view('livewire.frontend.home-component');
  }
}

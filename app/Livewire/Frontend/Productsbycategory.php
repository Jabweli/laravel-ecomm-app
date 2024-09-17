<?php

namespace App\Livewire\Frontend;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\ProductCategory;
use Illuminate\Support\Facades\Auth;
use Gloudemans\Shoppingcart\Facades\Cart;

class Productsbycategory extends Component
{

  public $slug;

  public function mount($slug)
  {
    $this->slug = $slug;
  }

  // change pagesize (pagination)
  public $pageSize = 12;
  public function changePageSize($size)
  {
    $this->pageSize = $size;
  }

  // sorting on shop page
  public $orderBy = "Default Sorting";
  public function changeOrderBy($order)
  {
    $this->orderBy = $order;
  }

  // product quick view
  public $quick_pdt;
  public function quickView($id)
  {
    $this->quick_pdt = Product::where('id', $id)->first();
  }

  public $min_value = 0;
  public $max_value = 1000;


  // add to cart
  public function store($product_id, $product_name, $product_price)
  {
    Cart::instance('cart')->add($product_id, $product_name, 1, $product_price)->associate('App\Models\Product');
    $this->dispatch('addedToCart')->self();
    $this->dispatch('addedToCart')->to(Minicart::class);
  }

  // add to wishList
  public function addToWishList($product_id, $product_name, $product_price)
  {

    Cart::instance('wishlist')->add($product_id, $product_name, 1, $product_price)->associate('App\Models\Product');
    $this->dispatch('addedToWishList')->self();
    $this->dispatch('addedToWishList')->to(Miniwishlist::class);
  }



  use WithPagination;
  public function render()
  {
    $category = ProductCategory::where('slug', $this->slug)->first();

    if ($category) {

      if ($this->orderBy == 'Price: Low to High') {
        $products = Product::whereBetween('sale_price', [$this->min_value, $this->max_value])->where('cat_id', $category->id)->orderBy('sale_price', 'ASC')->paginate($this->pageSize);
      } else if ($this->orderBy == 'Price: High to Low') {
        $products = Product::whereBetween('sale_price', [$this->min_value, $this->max_value])->where('cat_id', $category->id)->orderBy('sale_price', 'DESC')->paginate($this->pageSize);
      } else if ($this->orderBy == 'Sort by Latest') {
        $products = Product::whereBetween('sale_price', [$this->min_value, $this->max_value])->where('cat_id', $category->id)->orderBy('created_at', 'DESC')->paginate($this->pageSize);
      } else {
        $products = Product::whereBetween('sale_price', [$this->min_value, $this->max_value])->where('cat_id', $category->id)->paginate($this->pageSize);
      }

      $count = Product::where('cat_id', $category->id)->count();
      $categories = ProductCategory::all();
      $new_products = Product::latest()->take(3)->get();
    }

    if (Auth::check()) {
      Cart::instance('cart')->store(Auth::user()->id);
      Cart::instance('wishlist')->store(Auth::user()->id);
    }

    return view('livewire.frontend.productsbycategory', [
      'products' => $products,
      'count' => $count,
      'categories' => $categories,
      'new_products' => $new_products
    ])->extends('layouts.app');
  }
}

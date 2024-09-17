<?php

namespace App\Livewire\Frontend;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\ProductCategory;
use Illuminate\Support\Facades\Auth;
use Gloudemans\Shoppingcart\Facades\Cart;

class ShopComponent extends Component
{
  use WithPagination;

  public $pdt;
  public $count;
  public $categories;
  public $new_products;

  public $min_value;
  public $max_value;

  public function mount()
  {
    $this->pdt = Product::where('id', 1)->first();
    $this->count = Product::count();
    $this->categories = ProductCategory::all();
    $this->new_products = Product::latest()->take(3)->get();

    $this->min_value = 1;
    $this->max_value = 1000;
  }

  public $quick_pdt;
  public function quickView($id)
  {
    $this->quick_pdt = Product::where('id', $id)->first();
  }

  // change pagesize
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

  public function render()
  {
    if ($this->orderBy == 'Price: Low to High') {
      $products = Product::whereBetween('sale_price', [$this->min_value, $this->max_value])->orderBy('sale_price', 'ASC')->paginate($this->pageSize);
    } else if ($this->orderBy == 'Price: High to Low') {
      $products = Product::whereBetween('sale_price', [$this->min_value, $this->max_value])->orderBy('sale_price', 'DESC')->paginate($this->pageSize);
    } else if ($this->orderBy == 'Sort by Latest') {
      $products = Product::whereBetween('sale_price', [$this->min_value, $this->max_value])->orderBy('created_at', 'DESC')->paginate($this->pageSize);
    } else {
      $products = Product::whereBetween('sale_price', [$this->min_value, $this->max_value])->paginate($this->pageSize);
    }

    if (Auth::check()) {
      Cart::instance('cart')->store(Auth::user()->id);
      Cart::instance('wishlist')->store(Auth::user()->id);
    }
    return view('livewire.frontend.shop-component', ['products' => $products]);
  }
}

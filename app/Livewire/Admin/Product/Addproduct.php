<?php

namespace App\Livewire\Admin\Product;

use App\Models\Product;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use App\Models\ProductCategory;

class Addproduct extends Component
{
  public $categories;
  public $image;

  public function mount()
  {
    $this->categories = ProductCategory::all();
  }

  public function render()
  {
    return view('livewire.admin.product.addproduct');
  }

  public $name;
  public $cat_id;
  public $short_desc;
  public $regular_price;
  public $sale_price;
  public $badge;
  public $set_as;
  public $stock;
  public $qtty;
  public $sku;
  public $gallery;
  public $long_desc;
  public $additional_info;
  public $i = 0;

  use WithFileUploads;
  //  save product
  public function save()
  {

    $this->validate([
      'name' => 'required|string',
      'cat_id' => 'required|integer',
      'short_desc' => 'required|string',
      'image' => 'required|image|mimes:jpg,png,jpeg,avif,webp',
      'sale_price' => 'required',
      'stock' => 'required',
      'qtty' => 'required|integer',
    ]);

    sleep(3);
    $category = ProductCategory::where('id', $this->cat_id)->first();
    $filename = time() . 'png';


    // check if product name exists
    $check_product = Product::where('name', $this->name)->first();

    if ($check_product) {
      session()->flash('error', 'Product already exisits!');
    } else {
      // save product image
      $this->image->storeAs('products', $filename, 'public');

      // calculate discount percentage
      $discount = ($this->regular_price - $this->sale_price) / $this->regular_price * 100;

      $product = $category->products()->create([
        'name' => $this->name,
        'slug' => Str::slug($this->name),
        'cat_id' => $this->cat_id,
        'sale_price' => $this->sale_price,
        'regular_price' => $this->regular_price,
        'badge' => $this->badge,
        'image' => $filename,
        'set_as' => $this->set_as,
        'in_stock' => $this->stock,
        'qtty' => $this->qtty,
        'sku' => $this->sku,
        'short_desc' => $this->short_desc,
        'long_desc' => $this->long_desc,
        'discount' => $discount,
        'additional_info' => $this->additional_info
      ]);

      if (isset($this->gallery)) {
        $this->validate([
          'gallery.*' => 'image|max:2048|mimes:jpg,png,jpeg,webp'
        ]);

        foreach ($this->gallery as $photo) {

          $file_name = time() . $this->i++ . '.' . 'png';
          $photo->storeAs('pdtgallery', $file_name, 'public');

          $product->productImages()->create([
            'product_id' => $product->id,
            'image' => $file_name
          ]);
        }
      }

      session()->flash('saved', 'Product added successfully!');
      $this->reset(['name', 'cat_id', 'short_desc', 'regular_price', 'sale_price', 'image', 'sku', 'qtty', 'badge', 'long_desc', 'gallery', 'additional_info']);
    }
  }
}

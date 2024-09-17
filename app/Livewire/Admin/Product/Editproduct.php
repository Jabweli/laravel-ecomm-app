<?php

namespace App\Livewire\Admin\Product;

use App\Models\Product;
use Livewire\Component;
use Illuminate\Support\Str;
use App\Models\ProductImage;
use Livewire\WithFileUploads;
use App\Models\ProductCategory;
use Illuminate\Support\Facades\File;

class Editproduct extends Component
{
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
  public $edit_long_desc;
  public $image;
  public $current_image;
  public $additional_info;
  public $i = 0;

  public function render()
  {
    return view('livewire.admin.product.editproduct')->extends('layouts.admin');
  }

  public $categories;
  public $product;

  use WithFileUploads;

  public function mount($id)
  {
    $this->categories = ProductCategory::where('status', 1)->get();
    $this->product = Product::where('id', $id)->first();

    if ($this->product) {
      $this->name = $this->product->name;
      $this->short_desc = $this->product->short_desc;
      $this->regular_price = $this->product->regular_price;
      $this->sale_price = $this->product->sale_price;
      $this->badge = $this->product->badge;
      $this->set_as = $this->product->set_as;
      $this->stock = $this->product->in_stock;
      $this->sku = $this->product->sku;
      $this->edit_long_desc = $this->product->long_desc;
      $this->qtty = $this->product->qtty;
      $this->current_image = $this->product->image;
      $this->cat_id = $this->product->cat_id;
      $this->additional_info = $this->product->additional_info;
    }
  }

  // remove product image
  public function remove($id)
  {
    sleep(3);
    $pdt = Product::where('id', $id)->first();
    $pdtImg = $pdt->image;
    if ($pdtImg) {
      $destination = 'storage/products/' . $pdtImg;
      if (File::exists($destination)) {
        File::delete($destination);
      }

      $pdt->update([
        'image' => ''
      ]);

      $this->mount($id);
    }
  }

  // delete product image from gallery
  public function delete($id)
  {
    $pdtImg = ProductImage::where('id', $id)->first();
    if ($pdtImg) {
      $destination = 'storage/pdtgallery/' . $pdtImg->image;
      if (File::exists($destination)) {
        File::delete($destination);
      }

      $pdtImg->delete();
      session()->flash('deleted', 'Image deleted successfully!');
    } else {
      session()->flash('error', 'Image cound not be deleted, try again!');
    }
  }


  // update product details 
  public function update($id)
  {

    $product = Product::where('id', $id)->first();

    if ($product) {

      $this->validate([
        'name' => 'required|string',
        'cat_id' => 'required|integer',
        'short_desc' => 'required|string',
        'sale_price' => 'required',
        'stock' => 'required',
        'qtty' => 'required|integer',
      ]);

      if (empty($product->image)) {
        $this->validate([
          'image' => 'required|image|mimes:jpg,png,jpeg,webp',
        ]);
      }

      sleep(3);

      // if new product is uploaded, delete old image
      if (isset($this->image)) {
        $destination = 'storage/products/' . $product->image;
        if (File::exists($destination)) {
          File::delete($destination);
        }
        $filename = time() . 'png';
        $this->image->storeAs('products', $filename, 'public');
      } else {
        $filename = $product->image;
      }

      // calculate discount percentage
      $discount = ($this->regular_price - $this->sale_price) / $this->regular_price * 100;


      // update product details
      $product->update([
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
        'additional_info' => $this->additional_info,
      ]);

      // save gallery images if uploaded
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

      session()->flash('updated', 'Product updated successfully!');
      $this->mount($product->id);
    }
  }
}

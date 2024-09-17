<?php

namespace App\Livewire\Admin\Product;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\File;

class Products extends Component
{
  public $search;
  public $searchTerm;

  public function mount()
  {
    $this->fill(request()->only('search'));
    $this->searchTerm = '%' . $this->search . '%';
  }

  use WithPagination;
  protected $paginationTheme = 'bootstrap';

  public function render()
  {
    $products = Product::where('name', 'LIKE', $this->searchTerm)
      ->orWhere('in_stock', 'LIKE', $this->searchTerm)
      ->orWhere('sale_price', 'LIKE', $this->searchTerm)
      ->orWhere('regular_price', 'LIKE', $this->searchTerm)
      ->orWhere('sku', 'LIKE', $this->searchTerm)
      ->orWhere('qtty', 'LIKE', $this->searchTerm)
      ->orderBy('id', 'DESC')
      ->paginate(10);
    return view('livewire.admin.product.products', ['products' => $products]);
  }


  public function delete($id)
  {
    $product = Product::where('id', $id)->first();

    if ($product) {
      $destination = 'storage/products/' . $product->image;
      if (File::exists($destination)) {
        File::delete($destination);
      }

      $product->delete();
      session()->flash('deleted', 'Product deleted successfully!');
    }
  }
}

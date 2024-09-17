<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
   use HasFactory;

   protected $fillable = [
      'cat_id',
      'name',
      'slug',
      'regular_price',
      'sale_price',
      'badge',
      'short_desc',
      'long_desc',
      'image',
      'set_as',
      'in_stock',
      'qtty',
      'sku',
      'tags',
      'discount',
      'additional_info'
   ];


   public function category(){
      return $this->belongsTo(ProductCategory::class, 'cat_id', 'id');
   }

   public function productImages(){
      return $this->hasMany(ProductImage::class, 'product_id', 'id');
   }

   public function orderItems(){
      return $this->hasMany(OrderItem::class, 'product_id', 'id');
   }

   public function recentViews(){
      return $this->hasMany(RecentView::class);
   }

   public function reviews(){
      return $this->hasMany(Review::class);
   }
}

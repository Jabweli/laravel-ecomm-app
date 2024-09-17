<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
   use HasFactory;

   protected $table = 'posts';

   protected $fillable = [
      'title',
      'slug',
      'category_id',
      'image',
      'short_desc',
      'long_desc',
      'views'
   ];
 
 
   public function comments(){
      return $this->hasMany(Comment::class, 'post_id', 'id');
   }

   public function category(){
      return $this->belongsTo(PostCategory::class, 'category_id', 'id');
   }
}

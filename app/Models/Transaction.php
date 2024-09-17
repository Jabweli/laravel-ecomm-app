<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
   use HasFactory;

   protected $table = 'transactions';
   protected $fillable = [
      'user_id',
      'order_id',
      'mode',
      'status',
      'payment_id',
      'payer_id',
      'payer_email',
      'amount',
      'currency',
   ];

   public function order()
   {
      return $this->belongsTo(Order::class);
   }
}

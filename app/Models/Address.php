<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
   use HasFactory;

   protected $table = 'addresses';

   protected $fillable = [
      'user_id',
      'firstname',
      'lastname',
      'mobile',
      'email',
      'company',
      'country',
      'line1',
      'line2',
      'city',
      'state',
      'zipcode',
      'make_as',
      'make_default',
   ];
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
   /**
    * Run the migrations.
    */
   public function up(): void
   {
      Schema::create('addresses', function (Blueprint $table) {
         $table->id();
         $table->bigInteger('user_id')->unsigned();
         $table->string('firstname');
         $table->string('lastname');
         $table->string('mobile');
         $table->string('email');
         $table->string('company')->nullable();
         $table->string('country');
         $table->string('line1');
         $table->string('line2')->nullable();
         $table->string('city');
         $table->string('state');
         $table->string('zipcode')->nullable();
         $table->string('make_as')->nullable();
         $table->boolean('make_default')->default(false);
         $table->timestamps();
         $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
      });
   }

   /**
    * Reverse the migrations.
    */
   public function down(): void
   {
      Schema::dropIfExists('addresses');
   }
};

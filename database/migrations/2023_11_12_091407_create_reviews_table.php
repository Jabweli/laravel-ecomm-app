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
      Schema::create('reviews', function (Blueprint $table) {
         $table->id();
         $table->bigInteger('product_id')->unsigned();
         $table->bigInteger('user_id')->unsigned();
         $table->integer('rating');
         $table->string('title')->nullable();
         $table->text('comment')->nullable();
         $table->timestamps();
         $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
         $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
      });
   }

   /**
    * Reverse the migrations.
    */
   public function down(): void
   {
      Schema::dropIfExists('reviews');
   }
};

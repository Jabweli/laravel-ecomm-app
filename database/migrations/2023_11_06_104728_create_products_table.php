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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('cat_id');
            $table->string('name');
            $table->string('slug');
            $table->float('sale_price');
            $table->float('regular_price')->nullable();
            $table->string('badge')->nullable();
            $table->mediumText('short_desc');
            $table->longText('long_desc')->nullable();
            $table->string('image');
            $table->tinyInteger('featured')->default(0);
            $table->string('in_stock');
            $table->integer('qtty');
            $table->string('sku')->nullable();
            $table->string('tags')->nullable();

            $table->foreign('cat_id')->references('id')->on('product_categories')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};

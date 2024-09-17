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
      Schema::table('transactions', function (Blueprint $table) {
         $table->string('payment_id')->nullable();
         $table->string('payer_id')->nullable();
         $table->string('payer_email')->nullable();
         $table->decimal('amount', 10,2)->nullable();
         $table->string('currency')->nullable();
      });
   }

   /**
    * Reverse the migrations.
    */
   public function down(): void
   {
      Schema::table('transactions', function (Blueprint $table) {
         $table->dropColumn('payment_id');
         $table->dropColumn('payer_id');
         $table->dropColumn('payer_email');
         $table->dropColumn('amount', 10,2);
         $table->dropColumn('currency');
      });
   }
};

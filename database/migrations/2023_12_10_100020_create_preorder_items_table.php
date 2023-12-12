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
        Schema::create('preorder_items', function (Blueprint $table) {
            $table->id();
            $table->integer('preorder_id');
            $table->integer('product_id');
            $table->string('product_name');
            $table->integer('total_price');
            $table->integer('total_quantity');
            $table->integer('user_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('preorder_items');
    }
};

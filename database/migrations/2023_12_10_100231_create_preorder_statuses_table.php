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
        Schema::create('preorder_statuses', function (Blueprint $table) {
            $table->id();
            $table->integer('customer_id');
            $table->foreignId('preorder_id')->constrained('preorders')->cascadeOnDelete();
            $table->String('status');
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('preorder_statuses');
    }
};
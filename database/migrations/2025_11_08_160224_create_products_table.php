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
            $table->json('title');
            $table->json('short_description')->nullable();
            $table->json('content')->nullable();
            $table->foreignId('category_id')
            ->nullable()
            ->constrained('categories')
            ->onUpdate('set null')
            ->onDelete('set null');
            $table->boolean('status')->default(true);
            $table->json('keywords')->nullable();
            $table->string('slug');
            $table->softDeletes();
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

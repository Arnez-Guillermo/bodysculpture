<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name')->index();
            $table->string('slug')->unique()->index();
            $table->string('sku')->unique()->index();
            $table->text('description');
            $table->text('short_description')->nullable();
            $table->decimal('price', 10, 2)->index();
            $table->decimal('compare_price', 10, 2)->nullable();
            $table->integer('stock')->default(0)->index();
            $table->integer('min_stock')->default(5);
            $table->decimal('weight', 8, 2)->nullable();
            $table->string('dimensions')->nullable();
            $table->enum('level', ['home', 'professional'])->index();
            $table->boolean('is_active')->default(true)->index();
            $table->boolean('is_featured')->default(false)->index();
            $table->foreignId('category_id')->constrained('categories')->onDelete('restrict');
            $table->foreignId('brand_id')->nullable()->constrained('brands')->onDelete('set null');
            $table->string('meta_title')->nullable();
            $table->text('meta_description')->nullable();
            $table->timestamps();
            
            $table->index(['category_id', 'is_active', 'price']);
            $table->index(['brand_id', 'is_active']);
            $table->index(['level', 'is_active']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};


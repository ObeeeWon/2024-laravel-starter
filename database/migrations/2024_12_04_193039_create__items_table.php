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
        Schema::create('Items', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('category_id')->unsigned();
            $table->string('title', 100);
            $table->text('description')->nullable();
            $table->integer('price')->nullable();
            $table->string('sku');
            $table->bigInteger('quantity');
            $table->string('picture')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->unique(['title','category_id','sku']);// sometimes sku is also unique
            $table->index('title');
            $table->foreign('category_id')->references('id')->on('categories')
                  ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('items');
    }
};

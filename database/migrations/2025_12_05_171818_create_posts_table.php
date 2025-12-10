<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('content');
            $table->string('img_url')->nullable();

            // category_id column
            $table->unsignedBigInteger('category_id')->nullable();

            // slug column
            $table->string('slug')->nullable();

            $table->timestamps();

            // 🟢 Add the foreign key constraint
            $table->foreign('category_id')
                  ->references('id')
                  ->on('categories')
                  ->onDelete('set null');   // If category is deleted, set category_id to null
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};

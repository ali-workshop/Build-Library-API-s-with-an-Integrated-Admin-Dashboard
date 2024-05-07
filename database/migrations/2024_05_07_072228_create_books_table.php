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
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->constrained('categories','id');
            $table->foreignId('sub_category_id')->constrained('sub_categories','id');
            $table->foreignId('author_id')->constrained('authors','id');
            $table->foreignId('rate_id')->constrained('rates','id');
            $table->string('title');
            $table->boolean('favorite');
            $table->date('publicationDate');
            $table->string('src');
            $table->text('briefDescription');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};

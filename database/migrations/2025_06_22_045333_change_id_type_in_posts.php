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
        // Will Destroy Data
        Schema::dropIfExists('posts');

        // Then Created Again
        Schema::create('posts', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('author');
            $table->string('title');
            $table->text('body');
            $table->boolean('published');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('author');
            $table->string('title');
            $table->text('body');
            $table->boolean('published');
            $table->timestamps();
        });
    }
};

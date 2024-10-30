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
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->integer('article_number')->unique();
            $table->string('title');
            $table->text('authors');
            $table->year('publication_year');
            $table->string('journal');
            $table->string('doi')->nullable(); 
            // $table->string('doi')->nullable()->unique(); 
            $table->text('abstract');
            $table->timestamps();
        });

      
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('articles');
    }
};

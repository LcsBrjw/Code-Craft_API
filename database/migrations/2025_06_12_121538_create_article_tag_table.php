<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('article_tag', function (Blueprint $table) {
        $table->foreignId('article_id')->constrained('articles')->onDelete('cascade');
        $table->foreignId('tag_id')->constrained('tags')->onDelete('cascade');
        $table->primary(['article_id', 'tag_id']);
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('article_tag');
    }
};

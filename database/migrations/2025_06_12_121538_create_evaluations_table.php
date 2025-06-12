<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('evaluations', function (Blueprint $table) {
        $table->id();
        $table->unsignedTinyInteger('score_content');
        $table->unsignedTinyInteger('score_style');
        $table->unsignedTinyInteger('score_impact');
        $table->timestamps();
        $table->foreignId('article_id')->constrained('articles')->onDelete('cascade');
        $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('evaluations');
    }
};

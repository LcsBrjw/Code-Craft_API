<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('subtitle')->nullable();
            $table->text('content');
            $table->text('banner_url')->nullable();
            $table->string('status')->default('draft');
            $table->timestamps(); // created_at & updated_at
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('articles');
    }
};

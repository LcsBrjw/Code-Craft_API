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
    Schema::create('notifications', function (Blueprint $table) {
        $table->id();
        $table->text('message');
        $table->string('type');
        $table->boolean('status')->default(false);
        $table->timestamps();
        $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notifications');
    }
};

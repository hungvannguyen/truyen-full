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
        Schema::create('user_author', function (Blueprint $table) {
	        $table->id();
	        $table->ulid('user_id');
	        $table->ulid('author_id');
	        $table->timestamps();

	        $table->index('user_id');
	        $table->index('author_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_author');
    }
};

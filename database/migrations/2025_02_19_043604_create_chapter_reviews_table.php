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
        Schema::create('chapter_reviews', function (Blueprint $table) {
			$table->id();
	        $table->ulid('user_id');
	        $table->ulid('story_id');
	        $table->ulid('chapter_id');
	        $table->ulid('parent_id')->nullable();
			$table->tinyInteger('rating')->default(0);
	        $table->longText('content')->nullable();
	        $table->timestamps();
			$table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chapter_reviews');
    }
};

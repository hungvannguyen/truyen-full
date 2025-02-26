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
        Schema::create('user_read_story', function (Blueprint $table) {
	        $table->ulid('user_id');
	        $table->ulid('story_id');
	        $table->timestamps();
	        $table->primary(['user_id', 'story_id']);

	        $table->index('user_id');
	        $table->index('story_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_read_story');
    }
};

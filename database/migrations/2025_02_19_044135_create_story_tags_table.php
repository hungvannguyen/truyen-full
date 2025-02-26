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
        Schema::create('story_tags', function (Blueprint $table) {
			$table->ulid('story_id');
			$table->ulid('tag_id');
            $table->timestamps();
	        $table->primary(['story_id', 'tag_id']);

			$table->index('story_id');
			$table->index('tag_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('story_tags');
    }
};

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
        Schema::create('story_review', function (Blueprint $table) {
	        $table->ulid('user_id');
	        $table->ulid('story_id');
	        $table->ulid('parent_id')->nullable();
			$table->longText('content');
            $table->timestamps();
	        $table->primary(['user_id', 'story_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('story_review');
    }
};

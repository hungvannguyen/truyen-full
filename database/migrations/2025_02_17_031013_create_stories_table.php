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
        Schema::create('stories', function (Blueprint $table) {
            $table->ulid('id')->primary();
			$table->string('cover_image')->nullable();
			$table->string('title');
			$table->text('slug');
	        $table->text('description')->nullable();
			$table->float('rating')->default(0);
			$table->enum('status', ['draft','pending','published'])->default('draft');
			$table->bigInteger('chapter_count')->default(0);
			$table->bigInteger('view_count')->default(0);
			$table->bigInteger('rating_count')->default(0);
			$table->bigInteger('review_count')->default(0);
            $table->timestamps();
			$table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stories');
    }
};

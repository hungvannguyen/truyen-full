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
        Schema::create('chapters', function (Blueprint $table) {
            $table->ulid('id')->primary();
			$table->ulid('story_id');
			$table->integer('chapter_number');
			$table->string('title')->nullable();
			$table->string('slug')->nullable();
			$table->longText('content');
			$table->enum('status', ['draft','pending','approved','published','ban'])->default('draft');
			$table->bigInteger('view_count')->default(0);
	        $table->float('rating')->default(0);
	        $table->bigInteger('rating_count')->default(0);
	        $table->bigInteger('report_count')->default(0);
            $table->timestamps();
			$table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chapters');
    }
};

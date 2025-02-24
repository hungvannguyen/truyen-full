<?php

namespace App\Models;

use App\Enum\StoryStatus;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Chapter extends Model
{
    use HasUlids;

	protected $fillable = [
		'title',
		'slug',
		'content',
		'status',
		'chapter_number',
	];

	protected $casts = [
		'chapter_number' => 'integer',
		'status' => StoryStatus::class,
	];


	public function story(): BelongsTo
	{
		return $this->belongsTo(Story::class);
	}

	public function reviews(): HasMany
	{
		return $this->hasMany(ChapterReview::class);
	}
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class ChapterReview extends Model
{
	use HasFactory, SoftDeletes;
	public function story(): BelongsTo
	{
		return $this->belongsTo(Story::class);
	}

	public function chapter(): BelongsTo
	{
		return $this->belongsTo(Chapter::class);
	}

	public function user(): BelongsTo
	{
		return $this->belongsTo(User::class);
	}
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ChapterReview extends Model
{
    use HasUlids;

	public function chapter(): BelongsTo
	{
		return $this->belongsTo(Chapter::class);
	}

	public function user(): BelongsTo
	{
		return $this->belongsTo(User::class);
	}
}

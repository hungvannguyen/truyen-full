<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Review extends Model
{
    //

	public function user(): BelongsTo
	{
		return $this->belongsTo(User::class);
	}

	public function story(): BelongsTo
	{
		return $this->belongsTo(Story::class);
	}

	public function chapter(): BelongsTo
	{
		return $this->belongsTo(Chapter::class);
	}
}

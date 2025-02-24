<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Tag extends Model
{
	use HasUlids;

	public function tagGroup(): BelongsTo
	{
		return $this->belongsTo(TagGroup::class);
	}
}

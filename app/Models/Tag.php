<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tag extends Model
{
	use HasUlids, HasFactory, SoftDeletes;

	public function tagGroup(): BelongsTo
	{
		return $this->belongsTo(TagGroup::class);
	}
}

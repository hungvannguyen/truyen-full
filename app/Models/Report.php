<?php

namespace App\Models;

use App\Enum\ReportStatus;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Report extends Model
{
    //

	protected $fillable = [
		'reason',
		'status',
	];

	protected $casts = [
		'reason' => 'string',
		'status' => ReportStatus::class,
	];

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

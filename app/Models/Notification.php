<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
	use HasUuids;
	protected $fillable = [
		'user_id',
		'notifiable_id',
		'notifiable_type',
		'type',
		'data',
		'read_at',
	];

	protected $casts = [
		'user_id' => 'string',
		'notifiable_id' => 'string',
		'data' => 'array',
		'read_at' => 'datetime',
	];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TagGroup extends Model
{
    use HasUlids;

	protected $fillable = [
		'name',
		'slug',
	];

	protected $casts = [
		'name' => 'string',
		'slug' => 'string',
	];
	public function tags(): HasMany
	{
		return $this->hasMany(Tag::class);
	}
}

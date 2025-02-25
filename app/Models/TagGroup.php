<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class TagGroup extends Model
{
    use HasUlids, HasFactory, SoftDeletes;

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

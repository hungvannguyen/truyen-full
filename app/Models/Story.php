<?php

namespace App\Models;

use App\Enum\StoryStatus;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class Story extends Model
{
    use HasFactory, Notifiable, HasUlids, SoftDeletes;

	protected $fillable = [
		'cover_image',
		'title',
		'slug',
		'description',
		'rating',
		'status',
		'view_count',
		'review_count',
	];

	protected $casts = [
		'cover_image' => 'string',
		'title' => 'string',
		'slug' => 'string',
		'description' => 'string',
		'rating' => 'float',
		'status' => StoryStatus::class,
		'view_count' => 'integer',
		'review_count' => 'integer',
	];

	public function users(): BelongsToMany
	{
		return $this->belongsToMany(User::class, 'user_story', 'story_id', 'user_id');
	}

	public function tags(): BelongsToMany
	{
		return $this->belongsToMany(Tag::class, 'story_tags', 'story_id', 'tag_id');
	}

	public function chapters(): HasMany
	{
		return $this->hasMany(Chapter::class);
	}

	public function reviews(): HasMany
	{
		return $this->hasMany(StoryReview::class);
	}

	public function reports(): HasMany
	{
		return $this->hasMany(Report::class);
	}

	public function follows(): BelongsToMany
	{
		return $this->belongsToMany(User::class, 'user_follow', 'story_id', 'user_id');
	}
}

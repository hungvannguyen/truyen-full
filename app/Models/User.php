<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Enum\UserRole;
use App\Enum\UserStatus;
use Filament\Models\Contracts\FilamentUser;
use Filament\Panel;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements FilamentUser
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable, HasUlids, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
		'avatar',
        'name',
        'email',
        'password',
	    'provider',
	    'provider_id',
	    'status',
	    'role',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
			'avatar' => 'string',
            'name' => 'string',
            'email' => 'string',
	        'provider' => 'string',
	        'provider_id' => 'string',
	        'status' => UserStatus::class,
	        'role' => UserRole::class,
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

	public function canAccessPanel(Panel $panel): bool
	{
		return strtolower($this->role->value) === UserRole::ADMIN->value || $this->email === 'admin@gmail.com';
	}

	public function stories(): belongsToMany
	{
		return $this->belongsToMany(Story::class, 'user_story', 'user_id', 'story_id');
	}

	public function follows(): belongsToMany
	{
		return $this->belongsToMany(Story::class, 'user_follow', 'user_id', 'story_id');
	}

	public function reports(): HasMany
	{
		return $this->hasMany(Report::class);
	}
}

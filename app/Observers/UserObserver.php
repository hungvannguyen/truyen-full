<?php

namespace App\Observers;

use App\Enum\UserRole;
use App\Jobs\UserApprovedContributorJob;
use App\Jobs\UserRevokeContributorJob;
use App\Models\User;

class UserObserver
{
    /**
     * Handle the User "created" event.
     */
    public function created(User $user): void
    {
        //
    }

    /**
     * Handle the User "updated" event.
     */
    public function updated(User $user): void
    {
        if ($user->isDirty('role') && $user->role->value === UserRole::CONTRIBUTOR->value) {
			dispatch(new UserApprovedContributorJob($user));
		}

		if ($user->isDirty('role') && $user->getOriginal('role') === UserRole::CONTRIBUTOR->value && $user->role->value !== UserRole::CONTRIBUTOR->value) {
			dispatch(new UserRevokeContributorJob($user));
		}
    }

    /**
     * Handle the User "deleted" event.
     */
    public function deleted(User $user): void
    {
        //
    }

    /**
     * Handle the User "restored" event.
     */
    public function restored(User $user): void
    {
        //
    }

    /**
     * Handle the User "force deleted" event.
     */
    public function forceDeleted(User $user): void
    {
        //
    }
}

<?php

namespace App\Observers;

use App\Enums\ActivityTypes;
use App\Models\Activity;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class PetugasObserver
{
    /**
     * Handle the User "created" event.
     */
    public function created(User $user): void
    {
        Activity::query()->create([
            'type'      => ActivityTypes::PETUGAS,
            'user_id'   => Auth::user()->id,
            'petugas_id'    => $user->id,
        ]);
    }

    /**
     * Handle the User "updated" event.
     */
    public function updated(User $user): void
    {
        //
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

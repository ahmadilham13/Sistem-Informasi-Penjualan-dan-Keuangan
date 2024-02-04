<?php

namespace App\Observers;

use App\Enums\ActivityTypes;
use App\Models\Activity;
use App\Models\Modal;
use Illuminate\Support\Facades\Auth;

class ModalObserver
{
    /**
     * Handle the Modal "created" event.
     */
    public function created(Modal $modal): void
    {
        Activity::query()->create([
            'type'          => ActivityTypes::MODAL,
            'user_id'       => Auth::user()->id,
            'modal_id'      => $modal->id,
        ]);
    }

    /**
     * Handle the Modal "updated" event.
     */
    public function updated(Modal $modal): void
    {
        //
    }

    /**
     * Handle the Modal "deleted" event.
     */
    public function deleted(Modal $modal): void
    {
        //
    }

    /**
     * Handle the Modal "restored" event.
     */
    public function restored(Modal $modal): void
    {
        //
    }

    /**
     * Handle the Modal "force deleted" event.
     */
    public function forceDeleted(Modal $modal): void
    {
        //
    }
}

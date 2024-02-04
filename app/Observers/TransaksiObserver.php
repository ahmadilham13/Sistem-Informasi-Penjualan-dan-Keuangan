<?php

namespace App\Observers;

use App\Enums\ActivityTypes;
use App\Models\Activity;
use App\Models\Transaksi;
use Illuminate\Support\Facades\Auth;

class TransaksiObserver
{
    /**
     * Handle the Transaksi "created" event.
     */
    public function created(Transaksi $transaksi): void
    {
        Activity::query()->create([
            'type'          => ActivityTypes::TRANSAKSI,
            'user_id'       => Auth::user()->id,
            'transaksi_id'  => $transaksi->id,
        ]);
    }

    /**
     * Handle the Transaksi "updated" event.
     */
    public function updated(Transaksi $transaksi): void
    {
        //
    }

    /**
     * Handle the Transaksi "deleted" event.
     */
    public function deleted(Transaksi $transaksi): void
    {
        //
    }

    /**
     * Handle the Transaksi "restored" event.
     */
    public function restored(Transaksi $transaksi): void
    {
        //
    }

    /**
     * Handle the Transaksi "force deleted" event.
     */
    public function forceDeleted(Transaksi $transaksi): void
    {
        //
    }
}

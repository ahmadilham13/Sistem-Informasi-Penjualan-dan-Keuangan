<?php

namespace App\Observers;

use App\Enums\ActivityTypes;
use App\Models\Activity;
use App\Models\ProductBibit;
use Illuminate\Support\Facades\Auth;

class ProductBibitObserver
{
    /**
     * Handle the ProductBibit "created" event.
     */
    public function created(ProductBibit $productBibit): void
    {
        Activity::query()->create([
            'type'          => ActivityTypes::PRODUCT,
            'user_id'       => Auth::user()->id,
            'product_bibits_id' => $productBibit->id,
        ]);
    }

    /**
     * Handle the ProductBibit "updated" event.
     */
    public function updated(ProductBibit $productBibit): void
    {
        //
    }

    /**
     * Handle the ProductBibit "deleted" event.
     */
    public function deleted(ProductBibit $productBibit): void
    {
        //
    }

    /**
     * Handle the ProductBibit "restored" event.
     */
    public function restored(ProductBibit $productBibit): void
    {
        //
    }

    /**
     * Handle the ProductBibit "force deleted" event.
     */
    public function forceDeleted(ProductBibit $productBibit): void
    {
        //
    }
}

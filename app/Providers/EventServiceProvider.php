<?php

namespace App\Providers;

use App\Models\Modal;
use App\Models\ProductBibit;
use App\Models\Transaksi;
use App\Models\User;
use App\Observers\ModalObserver;
use App\Observers\PetugasObserver;
use App\Observers\ProductBibitObserver;
use App\Observers\TransaksiObserver;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
    ];

    protected $observers = [
        User::class => PetugasObserver::class,
        Modal::class => ModalObserver::class,
        ProductBibit::class => ProductBibitObserver::class,
        Transaksi::class => TransaksiObserver::class,
    ];

    /**
     * Register any events for your application.
     */
    public function boot(): void
    {
        //
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     */
    public function shouldDiscoverEvents(): bool
    {
        return false;
    }
}

<?php

namespace App\Providers;

use App\Interfaces\ActivityInterface;
use App\Interfaces\GajiInterface;
use App\Interfaces\KasirInterface;
use App\Interfaces\ModalInterface;
use App\Interfaces\ProductInterface;
use App\Interfaces\ProsesUangInterface;
use App\Interfaces\SaldoInterface;
use App\Interfaces\TransaksiInterface;
use App\Interfaces\UserInterface;
use App\Repositories\ActivityRepository;
use App\Repositories\GajiRepository;
use App\Repositories\KasirRepository;
use App\Repositories\ModalRepository;
use App\Repositories\ProductRepository;
use App\Repositories\ProsesUangRepository;
use App\Repositories\SaldoRepository;
use App\Repositories\TransaksiRepository;
use App\Repositories\UserRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    private array $bind = [
        // interface => // repository
        UserInterface::class => UserRepository::class,
        ProductInterface::class => ProductRepository::class,
        SaldoInterface::class => SaldoRepository::class,
        ProsesUangInterface::class => ProsesUangRepository::class,
        ModalInterface::class => ModalRepository::class,
        TransaksiInterface::class => TransaksiRepository::class,
        KasirInterface::class => KasirRepository::class,
        ActivityInterface::class => ActivityRepository::class,
        GajiInterface::class => GajiRepository::class,
    ];
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        foreach ($this->bind as $key => $value) {
            $this->app->bind($key, $value);
        }
    }
}

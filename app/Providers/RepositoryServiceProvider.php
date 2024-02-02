<?php

namespace App\Providers;

use App\Interfaces\ModalInterface;
use App\Interfaces\ProductInterface;
use App\Interfaces\ProsesUangInterface;
use App\Interfaces\SaldoInterface;
use App\Interfaces\UserInterface;
use App\Repositories\ModalRepository;
use App\Repositories\ProductRepository;
use App\Repositories\ProsesUangRepository;
use App\Repositories\SaldoRepository;
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

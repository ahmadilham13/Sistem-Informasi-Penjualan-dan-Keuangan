<?php

namespace App\Providers;

use App\Interfaces\ProductInterface;
use App\Interfaces\UserInterface;
use App\Repositories\ProductRepository;
use App\Repositories\UserRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    private array $bind = [
        // interface => // repository
        UserInterface::class => UserRepository::class,
        ProductInterface::class => ProductRepository::class,
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

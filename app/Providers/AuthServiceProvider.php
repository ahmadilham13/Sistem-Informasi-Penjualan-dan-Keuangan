<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Policies\TransaksiPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        Gate::before(function ($user, $ability) {
            if ($user->roleUser->permissions->where('route', 'superadmin')->count() > 0) {
                return true;
            }

            if($ability == 'transaksi.index' && $user->roleUser->id == 2) {
                return true;
            }
        });

        // $this->GateTransaksi();
    }

    private function GateTransaksi()
    {
        Gate::define('transaksi.index', [TransaksiPolicy::class, 'viewAny']);
    }
}

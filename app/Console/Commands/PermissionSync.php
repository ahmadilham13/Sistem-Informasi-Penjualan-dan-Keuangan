<?php

namespace App\Console\Commands;

use App\Models\Permission;
use App\Models\RoleUser;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Route;

class PermissionSync extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'permission:sync';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sync permission based on routes';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        Permission::query()->where('route', 'like', '%create')->delete();
        Permission::query()->where('route', 'like', '%edit')->delete();

        if (count(config('permission.delete')) > 0) {
            Permission::query()->whereIn('route', config('permission.delete'))->delete();
        }

        $routes = collect();

        $routes->add(['name' => 'Super Admin', 'route' => 'superadmin']);

        $routeCollection = collect(Route::getRoutes());

        foreach (config('permission.ignored') as $value) {
            $routeCollection = $routeCollection->filter(fn ($item) => ! str_contains($item->getName(), $value));
        }

        $routeCollection->each(function ($item) use ($routes) {
            $names = explode('.', $item->getName());
            foreach ($names as &$name) {
                $name = ucfirst($name);
            }
            $routes->add([
                'name' => implode(' ', $names),
                'route' => $item->getName()
            ]);
        });
        
        $routes = $routes->whereNotNull('route')->whereNotIn('route', config('permission.except'));
        
        foreach ($routes as $route) {
            if (Permission::query()->where('route', '=', $route['route'])->count() === 0) {
                Permission::query()->create([
                    'name' => $route['name'],
                    'route' => $route['route']
                ]);
            }
        }

        $permission = Permission::query()->where('route', '=', 'superadmin')->first();
        
        /** @var RoleUser $superAdmin */
        $superAdmin = RoleUser::query()->where('name', '=', 'Super Admin')->first();

        $superAdmin->permissions()->sync([$permission->id]);

        $permissions = Permission::query()->orderBy('route')->get();

        foreach ($permissions as $item) {
            $name = $item->name;
            if ($name === 'Index') {
                $name = 'Dashboard';
            } else {
                if (str_contains($name, 'Index')) {
                    $name = str_replace('Index', '', $name);
                    $name = 'List ' . $name;
                } else if(str_contains($name, 'Store')) {
                    $name = str_replace('Store', '', $name);
                    $name = 'Add ' . $name;
                } else if(str_contains($name, 'Show')) {
                    $name = str_replace('Show', '', $name);
                    $name = 'Detail ' . $name;
                } else if(str_contains($name, 'Update')) {
                    $name = str_replace('Update', '', $name);
                    $name = 'Edit ' . $name;
                } else if(str_contains($name, 'Destroy')) {
                    $name = str_replace('Destroy', '', $name);
                    $name = 'Delete ' . $name;
                }
            }

            $item->update(['name' => $name]);
        }
    }
}

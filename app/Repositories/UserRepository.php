<?php 


namespace App\Repositories;

use App\Interfaces\UserInterface;
use App\Models\User;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;

class UserRepository implements UserInterface
{
    public function GetPaginatedUser(string $search, string $sortBy, string $sortDirection, int $perPage = 10, int $currentPage = 1) : LengthAwarePaginator
    {
        return User::query()
            ->when(!empty($search), fn(Builder $query) => $query->where(DB::raw('lower(name)'), 'like', '%' . strtolower($search) . '%'))
            ->with('roleUser')
            ->when(! empty($sortBy) && ! empty($sortDirection), fn (Builder $query) => $query->orderBy($sortBy, $sortDirection))
            ->when(empty($sortBy) && empty($sortDirection), fn (Builder $query) => $query->oldest())
            ->paginate(perPage: $perPage, page: $currentPage);
    }
}


?>
<?php 


namespace App\Repositories;

use App\Http\Requests\UserRequest;
use App\Http\Resources\UserResource;
use App\Interfaces\UserInterface;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Support\Facades\DB;

class UserRepository implements UserInterface
{
    public function GetAllUser(): Collection
    {
        return User::query()
            ->where('role_user_id', '=', 2)
            ->get();
    }

    public function GetPaginatedUser(string $search, string $sortBy, string $sortDirection, int $perPage = 10, int $currentPage = 1) : LengthAwarePaginator
    {
        return User::query()
            ->when(!empty($search), fn(Builder $query) => $query->where(DB::raw('lower(name)'), 'like', '%' . strtolower($search) . '%'))
            ->when(! empty($sortBy) && ! empty($sortDirection), fn (Builder $query) => $query->orderBy($sortBy, $sortDirection))
            ->when(empty($sortBy) && empty($sortDirection), fn (Builder $query) => $query->oldest())
            ->with('roleUser')
            ->paginate(perPage: $perPage, page: $currentPage);
    }

    public function GetOnlineUsers() : AnonymousResourceCollection
    {
        $timeExp = Carbon::now()->subMinutes(config('auth.user_online_expired'));

        $collection = User::query()
            ->where('last_seen', '>=', $timeExp)
            ->with('media')
            ->get();
        return UserResource::collection($collection);
    }

    public function CreateUser(UserRequest $request): UserResource
    {
        $data = $request->validated();
        $data["role_user_id"] = 2;
        $data["email_verified_at"] = Carbon::now()->format('Y-m-d H:i:s');  // email auto verified

        $user = DB::transaction(function () use($data, $request) {
            $user = User::query()->create($data);
            if($request->hasFile('avatar')) {
                $user->addMediaFromRequest('avatar')
                    ->toMediaCollection();
            }
            return $user;
        });

        return new UserResource($user);
    }

    public function UpdateUser(int $userId, UserRequest $request): UserResource
    {
        $user = User::query()
        ->where('id', '=', $userId)
        ->first();

        $data = $request->validated();
        $user = DB::transaction(function () use ($user, $data, $request) {
            $user->update($data);
            if($request->hasFile('avatar')) {
                $user->media()->delete();
                $user->addMediaFromRequest('avatar')
                    ->toMediaCollection();
            }
            return $user;
        });

        return new UserResource($user);
    }

    public function DeleteUser(User $user)
    {
        return $user->delete();
    }
}


?>
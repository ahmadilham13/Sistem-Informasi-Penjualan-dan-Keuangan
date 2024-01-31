<?php 

namespace App\Interfaces;

use App\Http\Requests\UserRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

interface UserInterface
{
    public function GetPaginatedUser(string $search, string $sortBy, string $sortDirection, int $perPage = 10, int $currentPage = 1) : LengthAwarePaginator;
    public function GetOnlineUsers() : AnonymousResourceCollection;
    public function CreateUser(UserRequest $request) : UserResource;
    public function UpdateUser(int $userId, UserRequest $request) : UserResource;
    public function DeleteUser(User $user);

}

?>
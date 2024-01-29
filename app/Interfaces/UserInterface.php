<?php 

namespace App\Interfaces;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;

interface UserInterface
{
    public function GetPaginatedUser(string $search, string $sortBy, string $sortDirection, int $perPage = 10, int $currentPage = 1) : LengthAwarePaginator;
}

?>
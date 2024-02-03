<?php 

namespace App\Interfaces;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

interface TransaksiInterface
{
    public function GetPaginatedTransaksi(string $search, string $sortBy, string $sortDirection, int $perPage = 10, int $currentPage = 1) : LengthAwarePaginator;

}

?>
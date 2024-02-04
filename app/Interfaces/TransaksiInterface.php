<?php 

namespace App\Interfaces;

use App\Http\Requests\TransaksiRequest;
use App\Http\Resources\TransaksiResource;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

interface TransaksiInterface
{
    public function GetPaginatedTransaksi(string $search, string $sortBy, string $sortDirection, int $perPage = 10, int $currentPage = 1) : LengthAwarePaginator;
    public function CreateTransaksi(TransaksiRequest $request) : TransaksiResource;

}

?>
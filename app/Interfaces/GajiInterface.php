<?php 

namespace App\Interfaces;

use App\Http\Requests\GajiRequest;
use App\Http\Resources\GajiResource;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

interface GajiInterface
{
    public function GetPaginatedGaji(string $search, string $sortBy, string $sortDirection, int $perPage = 10, int $currentPage = 1) : LengthAwarePaginator;
    public function CreateGaji(GajiRequest $request) : GajiResource;
}

?>
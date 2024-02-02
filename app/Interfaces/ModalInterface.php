<?php 

namespace App\Interfaces;

use App\Http\Requests\ModalRequest;
use App\Http\Resources\ModalResource;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

interface ModalInterface
{
    public function GetPaginatedModal(string $search, string $sortBy, string $sortDirection, int $perPage = 10, int $currentPage = 1) : LengthAwarePaginator;
    public function CreateModal(ModalRequest $request) : ModalResource;
}

?>
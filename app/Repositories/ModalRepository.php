<?php 

namespace App\Repositories;

use App\Http\Requests\ModalRequest;
use App\Http\Resources\ModalResource;
use App\Interfaces\ModalInterface;
use App\Models\Modal;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;

class ModalRepository implements ModalInterface
{
    public function GetPaginatedModal(string $search, string $sortBy, string $sortDirection, int $perPage = 10, int $currentPage = 1): LengthAwarePaginator
    {
        return Modal::query()
        ->when(!empty($search), fn(Builder $query) => $query->where(DB::raw('lower(name)'), 'like', '%' . strtolower($search) . '%'))
        ->when(! empty($sortBy) && ! empty($sortDirection), fn (Builder $query) => $query->orderBy($sortBy, $sortDirection))
        ->when(empty($sortBy) && empty($sortDirection), fn (Builder $query) => $query->oldest())
        ->paginate(perPage: $perPage, page: $currentPage);
    }

    public function CreateModal(ModalRequest $request): ModalResource
    {
        $data = $request->validated();

        $modal = DB::transaction(function () use($data, $request) {
            $modal = Modal::query()->create($data);

            return $modal;
        });

        return new ModalResource($modal);
    }
}

?>
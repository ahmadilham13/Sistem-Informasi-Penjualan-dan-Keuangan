<?php 

namespace App\Repositories;

use App\Http\Requests\GajiRequest;
use App\Http\Resources\GajiResource;
use App\Interfaces\GajiInterface;
use App\Models\Gaji;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;

class GajiRepository implements GajiInterface
{
    public function GetPaginatedGaji(string $search, string $sortBy, string $sortDirection, int $perPage = 10, int $currentPage = 1): LengthAwarePaginator
    {
        return Gaji::query()
        ->when(!empty($search), fn(Builder $query) => $query->where(DB::raw('lower(user.name)'), 'like', '%' . strtolower($search) . '%'))
        ->when(! empty($sortBy) && ! empty($sortDirection), fn (Builder $query) => $query->orderBy($sortBy, $sortDirection))
        ->when(empty($sortBy) && empty($sortDirection), fn (Builder $query) => $query->oldest())
        ->with('user')
        ->paginate(perPage: $perPage, page: $currentPage);
    }

    public function CreateGaji(GajiRequest $request): GajiResource
    {
        $data = $request->validated();

        $gaji = DB::transaction(function () use($data, $request) {
            $gaji = Gaji::query()->create($data);

            return $gaji;
        });

        return new GajiResource($gaji);
    }
}

?>
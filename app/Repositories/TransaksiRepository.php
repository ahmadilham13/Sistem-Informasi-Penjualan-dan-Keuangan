<?php 

namespace App\Repositories;

use App\Interfaces\TransaksiInterface;
use App\Models\Transaksi;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;

class TransaksiRepository implements TransaksiInterface
{
    public function GetPaginatedTransaksi(string $search, string $sortBy, string $sortDirection, int $perPage = 10, int $currentPage = 1): LengthAwarePaginator
    {
        return Transaksi::query()
        ->when(!empty($search), fn(Builder $query) => $query->where(DB::raw('lower(customer_name)'), 'like', '%' . strtolower($search) . '%')->orWhere(DB::raw('lower(kode_transaksi)'), 'like', '%' . strtolower($search) . '%'))
        ->when(! empty($sortBy) && ! empty($sortDirection), fn (Builder $query) => $query->orderBy($sortBy, $sortDirection))
        ->when(empty($sortBy) && empty($sortDirection), fn (Builder $query) => $query->oldest())
        ->groupBy('id','kode_transaksi')
        ->paginate(perPage: $perPage, page: $currentPage);
    }
}

?>
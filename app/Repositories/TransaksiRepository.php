<?php 

namespace App\Repositories;

use App\Http\Requests\TransaksiRequest;
use App\Http\Resources\TransaksiResource;
use App\Interfaces\TransaksiInterface;
use App\Models\Transaksi;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TransaksiRepository implements TransaksiInterface
{
    public function GetPaginatedTransaksi(string $search, string $sortBy, string $sortDirection, int $perPage = 10, int $currentPage = 1): LengthAwarePaginator
    {
        return Transaksi::query()
        ->when(!empty($search), fn(Builder $query) => $query->where(DB::raw('lower(customer_name)'), 'like', '%' . strtolower($search) . '%')->orWhere(DB::raw('lower(kode_transaksi)'), 'like', '%' . strtolower($search) . '%'))
        ->when(! empty($sortBy) && ! empty($sortDirection), fn (Builder $query) => $query->orderBy($sortBy, $sortDirection))
        ->when(empty($sortBy) && empty($sortDirection), fn (Builder $query) => $query->oldest())
        ->with([
            'productBibit'
        ])
        // ->groupBy('id','kode_transaksi')
        ->paginate(perPage: $perPage, page: $currentPage);
    }

    public function CreateTransaksi(TransaksiRequest $request): TransaksiResource
    {
        $customer_name = $request->customer_name;
        $product_id = $request->product_id;
        $product_quantity = $request->quantity;
        $kode_transaksi = "TRN" . uniqid();

        for($i = 0; $i < count($product_id); $i++) {
            $transaksi = new Transaksi();
            
            $transaksi->kode_transaksi = $kode_transaksi;
            $transaksi->customer_name = $customer_name;
            $transaksi->product_bibits_id = $product_id[$i];
            $transaksi->quantity = $product_quantity[$i];
            $transaksi->user_id = Auth::user()->id;
            $transaksi->save();
        }

        return new TransaksiResource($transaksi);
        
    }
}

?>
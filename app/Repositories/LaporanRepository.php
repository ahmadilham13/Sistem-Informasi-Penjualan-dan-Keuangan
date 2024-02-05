<?php 

namespace App\Repositories;

use App\Interfaces\LaporanInterface;
use App\Models\Activity;
use App\Models\Gaji;
use App\Models\Modal;
use App\Models\Transaksi;
use Illuminate\Pagination\LengthAwarePaginator;

class LaporanRepository implements LaporanInterface
{
    public function GetAllLaporan(?string $bulan = null, string $tahun): array
    {

        $query =  Transaksi::query()->whereYear('created_at', $tahun);

        if (!is_null($bulan)) {
            $query->whereMonth('created_at', $bulan);
        }

        $query->with(['user', 'productBibit']);

        $data = $query->get()->toArray();

        return $data;
    }

    public function GetTotalPengeluaran(?string $bulan=null, string $tahun)
    {
        $queryModal = Modal::query()->whereYear('created_at', $tahun);

        if (!is_null($bulan)) {
            $queryModal->whereMonth('created_at', $bulan);
        }

        $dataQueryModal = $queryModal->get()->toArray();

        $totalModal = 0;
        
        foreach($dataQueryModal as $key => $value) {
            $totalModal += $value["harga"];
        }

        $queryGaji = Gaji::query()->whereYear('created_at', $tahun);

        if (!is_null($bulan)) {
            $queryGaji->whereMonth('created_at', $bulan);
        }

        $dataQueryGaji = $queryGaji->get()->toArray();

        $totalGaji = 0;

        foreach ($dataQueryGaji as $key => $value) {
            $totalGaji += $value["nominal"];
        }

        return $totalModal + $totalGaji;
    }
}

?>
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
    public function GetAllLaporan(string $tanggal, ?string $bulan = null, string $tahun): array
    {

        $query =  Transaksi::query()->whereYear('created_at', $tahun);

        if (!is_null($bulan)) {
            $query->whereMonth('created_at', $bulan);
        }

        if(!empty($tanggal)) {
            $query->whereDay('created_at', '=', $tanggal);
        }

        $query->with(['user', 'productBibit']);

        $data = $query->get()->toArray();

        return $data;
    }

    public function GetTotalPengeluaran(string $tanggal, ?string $bulan=null, string $tahun)
    {
        $queryModal = Modal::query()->whereYear('created_at', $tahun);

        if (!is_null($bulan)) {
            $queryModal->whereMonth('created_at', $bulan);
        }

        if(!empty($tanggal)) {
            $queryModal->whereDay('created_at', '=', $tanggal);
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

        if(!empty($tanggal)) {
            $queryGaji->whereDay('created_at', '=', $tanggal);
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
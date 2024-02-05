<?php 

namespace App\Interfaces;

interface LaporanInterface
{
    public function GetAllLaporan(string $bulan=null, string $tahun) : array;
    public function GetTotalPengeluaran(string $bulan=null, string $tahun); 
}

?>
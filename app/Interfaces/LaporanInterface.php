<?php 

namespace App\Interfaces;

interface LaporanInterface
{
    public function GetAllLaporan(string $tanggal, string $bulan=null, string $tahun) : array;
    public function GetTotalPengeluaran(string $tanggal, string $bulan=null, string $tahun); 
}

?>
<?php

namespace App\Http\Controllers\Laporan;

use App\Http\Controllers\Controller;
use App\Interfaces\LaporanInterface;
use App\Interfaces\TransaksiInterface;

class BaseController extends Controller
{
    public function __construct(protected TransaksiInterface $transaksi, protected LaporanInterface $laporan) {
    }
}

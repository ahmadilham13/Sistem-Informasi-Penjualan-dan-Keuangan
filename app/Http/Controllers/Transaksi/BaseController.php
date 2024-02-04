<?php

namespace App\Http\Controllers\Transaksi;

use App\Http\Controllers\Controller;
use App\Interfaces\KasirInterface;
use App\Interfaces\ProductInterface;
use App\Interfaces\ProsesUangInterface;
use App\Interfaces\SaldoInterface;
use App\Interfaces\TransaksiInterface;

class BaseController extends Controller
{
    public function __construct(protected TransaksiInterface $transaksi, protected ProductInterface $product, protected KasirInterface $kasir, protected SaldoInterface $saldo, protected ProsesUangInterface $uang) {
    }
}

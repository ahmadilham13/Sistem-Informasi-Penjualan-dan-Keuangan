<?php

namespace App\Http\Controllers\Modal;

use App\Http\Controllers\Controller;
use App\Interfaces\ModalInterface;
use App\Interfaces\ProsesUangInterface;
use App\Interfaces\SaldoInterface;

class BaseController extends Controller
{
    public function __construct(protected ModalInterface $modal, protected ProsesUangInterface $uang, protected SaldoInterface $saldo) {
    }
}

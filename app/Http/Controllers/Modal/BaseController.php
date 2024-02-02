<?php

namespace App\Http\Controllers\Modal;

use App\Http\Controllers\Controller;
use App\Interfaces\ModalInterface;
use App\Interfaces\SaldoInterface;
use App\Repositories\ProsesUangRepository;

class BaseController extends Controller
{
    public function __construct(protected ModalInterface $modal, protected ProsesUangRepository $uang, protected SaldoInterface $saldo) {
    }
}

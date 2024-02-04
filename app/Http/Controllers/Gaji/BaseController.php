<?php

namespace App\Http\Controllers\Gaji;

use App\Http\Controllers\Controller;
use App\Interfaces\GajiInterface;
use App\Interfaces\ProsesUangInterface;
use App\Interfaces\SaldoInterface;
use App\Interfaces\UserInterface;

class BaseController extends Controller
{
    public function __construct(protected GajiInterface $gaji, protected UserInterface $user, protected ProsesUangInterface $uang, protected SaldoInterface $saldo) {
    }
}

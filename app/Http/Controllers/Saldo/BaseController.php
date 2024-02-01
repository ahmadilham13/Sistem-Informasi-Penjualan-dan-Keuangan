<?php

namespace App\Http\Controllers\Saldo;

use App\Http\Controllers\Controller;
use App\Interfaces\ProsesUangInterface;
use App\Interfaces\SaldoInterface;

class BaseController extends Controller
{
    public function __construct(protected SaldoInterface $saldo, protected ProsesUangInterface $uang) {
    }
}

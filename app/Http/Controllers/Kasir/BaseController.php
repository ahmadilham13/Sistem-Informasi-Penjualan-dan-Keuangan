<?php

namespace App\Http\Controllers\Kasir;

use App\Http\Controllers\Controller;
use App\Interfaces\KasirInterface;

class BaseController extends Controller
{
    public function __construct(protected KasirInterface $kasir) {
    }
}

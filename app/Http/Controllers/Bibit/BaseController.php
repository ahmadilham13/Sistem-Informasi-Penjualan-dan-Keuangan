<?php

namespace App\Http\Controllers\Bibit;

use App\Http\Controllers\Controller;
use App\Interfaces\ProductInterface;

class BaseController extends Controller
{
    public function __construct(protected ProductInterface $product) {
    }
}

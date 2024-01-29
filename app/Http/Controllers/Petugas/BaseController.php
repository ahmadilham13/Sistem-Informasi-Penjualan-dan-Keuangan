<?php

namespace App\Http\Controllers\Petugas;

use App\Http\Controllers\Controller;
use App\Interfaces\UserInterface;

class BaseController extends Controller
{
    public function __construct(protected UserInterface $groupUser, protected UserInterface $user) {
    }
}

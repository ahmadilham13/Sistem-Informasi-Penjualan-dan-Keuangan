<?php

namespace App\Http\Controllers;

use App\Http\Traits\HasPagination;
use App\Http\Traits\HasSearch;
use App\Http\Traits\HasSort;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests, HasPagination, HasSearch, HasSort;
}

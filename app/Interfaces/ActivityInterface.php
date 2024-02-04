<?php 

namespace App\Interfaces;

use Illuminate\Pagination\LengthAwarePaginator;

interface ActivityInterface
{
    public function GetAllActivity() : LengthAwarePaginator;
}

?>
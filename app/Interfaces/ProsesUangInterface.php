<?php 

namespace App\Interfaces;

use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

interface ProsesUangInterface
{
    public function GetProsesUang() : AnonymousResourceCollection;
}

?>
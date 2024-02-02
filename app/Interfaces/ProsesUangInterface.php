<?php 

namespace App\Interfaces;

use App\Enums\NamaProses;
use App\Enums\TypeProses;
use App\Http\Resources\UangResource;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

interface ProsesUangInterface
{
    public function GetProsesUang() : AnonymousResourceCollection;
    public function CreateUangLog(NamaProses $namaProses, TypeProses $typeProses, int $nominal, int $modelId=null, string $modelType=null) : UangResource;
}

?>
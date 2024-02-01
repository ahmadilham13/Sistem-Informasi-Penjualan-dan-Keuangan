<?php 

namespace App\Repositories;

use App\Http\Resources\UangResource;
use App\Interfaces\ProsesUangInterface;
use App\Models\proses_uang;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class ProsesUangRepository implements ProsesUangInterface
{
    public function GetProsesUang(): AnonymousResourceCollection
    {
        $collection = proses_uang::query()->get();

        return UangResource::collection($collection);
    }
}

?>
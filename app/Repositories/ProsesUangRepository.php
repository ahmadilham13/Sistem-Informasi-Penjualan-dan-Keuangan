<?php 

namespace App\Repositories;

use App\Enums\NamaProses;
use App\Enums\TypeProses;
use App\Http\Resources\UangResource;
use App\Interfaces\ProsesUangInterface;
use App\Models\proses_uang;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Support\Facades\Auth;

class ProsesUangRepository implements ProsesUangInterface
{
    public function GetProsesUang(): AnonymousResourceCollection
    {
        $collection = proses_uang::query()->orderBy('created_at', 'asc')->get();

        return UangResource::collection($collection);
    }

    public function CreateUangLog(NamaProses $namaProses, TypeProses $typeProses, int $nominal, int $modelId=null, string $modelType=null) : UangResource
    {
        $data = new proses_uang();

        $data->nama_proses = $namaProses;
        $data->type_proses = $typeProses;
        $data->nominal = $nominal;
        $data->user_id = Auth::user()->id;

        if(!empty($modelId)) {
            $data->model_id = $modelId;
        }

        if(!empty($modelType)) {
            $data->model_type = $modelType;
        }

        $data->save();
        
        return new UangResource($data);
    }
}

?>
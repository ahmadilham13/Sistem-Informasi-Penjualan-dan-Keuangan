<?php

namespace App\Http\Resources;

use App\Enums\NamaProses;
use App\Enums\TypeProses;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UangResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'            => $this->id,
            'nams_proses'   => NamaProses::getDisplayName($this->nama_proses),    
            'type_proses'   => TypeProses::getDisplayName($this->type_proses),    
            'nominal'       => $this->nominal,
            'model_id'      => $this->model_id,
            'model_type'      => $this->model_type,
            'created_at'    => $this->created_at->format('Y-m-d H:i:s'),
            'updated_at'    => !empty($this->updated_at) ? $this->updated_at->format('Y-m-d H:i:s') : null,
        ];
    }
}

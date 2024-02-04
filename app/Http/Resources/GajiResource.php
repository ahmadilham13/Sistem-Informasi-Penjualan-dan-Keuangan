<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class GajiResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'                    => $this->id, 
            'karyawan_id'           => $this->karyawan_id,
            'nominal'               => $this->nominal,
            'created_at'            => $this->created_at->format('Y-m-d H:i:s'),
            'updated_at'            => !empty($this->updated_at) ? $this->updated_at->format('Y-m-d H:i:s') : null,
        ];
    }
}

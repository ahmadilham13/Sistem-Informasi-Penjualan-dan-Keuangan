<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TransaksiResource extends JsonResource
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
            'customer_name'         => $this->customer_name,    
            'product_bibits_id'     => $this->product_bibits_id,
            'quantity'              => $this->quantity,
            'user_id'               => $this->user_id,
            'created_at'            => $this->created_at->format('Y-m-d H:i:s'),
            'updated_at'            => !empty($this->updated_at) ? $this->updated_at->format('Y-m-d H:i:s') : null,
        ];
    }
}

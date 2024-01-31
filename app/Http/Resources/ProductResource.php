<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
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
            'product_id'    => $this->product_id,
            'product_name'  => $this->product_name,
            'harga_beli'    => $this->harga_beli,
            'harga_jual'    => $this->harga_jual,
            'stock'         => $this->stock,
            'created_at'    => $this->created_at->format('Y-m-d H:i:s'),
            'updated_at'    => !empty($this->updated_at) ? $this->updated_at->format('Y-m-d H:i:s') : null,
        ];
    }
}

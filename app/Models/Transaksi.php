<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transaksi extends Model
{
    use HasFactory, SoftDeletes;

    
    /**
     * Product Bibit
     *
     * @return void
     */
    public function productBibit() : BelongsTo
    {
        return $this->belongsTo(ProductBibit::class);
    }

    /**
     * Transaksi
     *
     * @return void
     */
    public function transaksi() : HasMany
    {
        return $this->hasMany(Transaksi::class);
    }
}

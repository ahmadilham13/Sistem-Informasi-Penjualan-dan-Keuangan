<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class ProductBibit extends Model implements HasMedia
{
    use HasFactory, SoftDeletes, InteractsWithMedia;

    protected $fillable = [
        'product_id',
        'product_name',
        'harga_jual',
        'stock',
        'description',
    ];

    /**
     * Transaksi
     *
     * @return void
     */
    public function transaksi() : HasMany
    {
        return $this->hasMany(Transaksi::class);
    }

    /**
     * Kasir
     *
     * @return void
     */
    public function kasir() : HasMany
    {
        return $this->hasMany(Kasir::class);
    }
}

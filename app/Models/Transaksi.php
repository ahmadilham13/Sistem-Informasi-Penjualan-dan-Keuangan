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

    protected $fillable = [
        'kode_transaksi',
        'customer_name',
        'product_bibits_id',
        'quantity',
        'user_id',
    ];
    
    /**
     * Product Bibit
     *
     * @return void
     */
    public function productBibit() : BelongsTo
    {
        return $this->belongsTo(ProductBibit::class, "product_bibits_id");
    }

    /**
     * Get the user that owns the Transaksi
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user() : BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}

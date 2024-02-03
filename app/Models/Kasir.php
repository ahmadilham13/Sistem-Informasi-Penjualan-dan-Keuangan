<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Kasir extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'product_bibits_id',
        'user_id',
        'quantity',
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
     * Get the user that owns the Kasir
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user() : BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}

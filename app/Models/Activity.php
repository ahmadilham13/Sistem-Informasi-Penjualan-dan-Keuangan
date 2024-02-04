<?php

namespace App\Models;

use App\Enums\ActivityTypes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Activity extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'type',
        'user_id',
        'petugas_id',
        'product_bibits_id',
        'modal_id',
        'transaksi_id',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'type' => ActivityTypes::class
    ];

    /**
     * Get the user that lead the Activity
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user() : BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id')->withTrashed();
    }

    /**
     * Get the Petugas that owns the Activity
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function petugas() : BelongsTo
    {
        return $this->belongsTo(User::class, 'petugas_id')->withTrashed();
    }

    /**
     * Get the Product Bibit that owns the Activity
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function product_bibit() : BelongsTo
    {
        return $this->belongsTo(ProductBibit::class, 'product_bibits_id')->withTrashed();
    }

    /**
     * Get the Modal that owns the Activity
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function modal() : BelongsTo
    {
        return $this->belongsTo(Modal::class, 'modal_id')->withTrashed();
    }

    /**
     * Get the Transaksi that owns the Activity
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function transaksi() : BelongsTo
    {
        return $this->belongsTo(Transaksi::class, 'transaksi_id')->withTrashed();
    }

}

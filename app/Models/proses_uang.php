<?php

namespace App\Models;

use App\Enums\NamaProses;
use App\Enums\TypeProses;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class proses_uang extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_proses',
        'type_proses',
        'nominal',
        'model_id',
        'model_type',
        'user_id'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'nama_proses' => NamaProses::class,
        'type_proses' => TypeProses::class,
    ];


    /**
     * Get the user that create the Ticket
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user() : BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}

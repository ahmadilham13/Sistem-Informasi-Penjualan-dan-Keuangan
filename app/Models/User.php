<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class User extends Authenticatable implements HasMedia
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes, InteractsWithMedia;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role_user_id',
        'email_verified_at',
    ];

    protected $with = ['media'];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    /**
     * RoleUser
     *
     * @return void
     */
    public function roleUser() : BelongsTo
    {
        return $this->belongsTo(RoleUser::class);
    }

    public function proses_uang()
    {
        return $this->belongsToMany(proses_uang::class, 'proses_uang')->withTimestamps();
    }

    public function transaksi()
    {
        return $this->belongsToMany(Transaksi::class, 'transaksi')->withTimestamps();
    }

    public function kasir()
    {
        return $this->belongsToMany(Kasir::class, 'kasir')->withTimestamps();
    }

    public function gaji() : HasMany
    {
        return $this->hasMany(Gaji::class);
    }
}

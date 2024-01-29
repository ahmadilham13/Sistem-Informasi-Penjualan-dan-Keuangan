<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class RoleUser extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'author_id',
    ];

    protected $appends = [
        'deleteable'
    ];

    /**
     * RoleUser
     *
     * @return void
     */
    public function users() : HasMany
    {
        return $this->hasMany(User::class);
    }

    public function Deleteable() : Attribute
    {
        return Attribute::make(
            get: fn() => isset($this->users_count) && $this->users_count > 0 ? false : true
        );
    }
}

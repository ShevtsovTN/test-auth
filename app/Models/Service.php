<?php

namespace App\Models;

use App\Enums\ServiceActionEnum;
use App\Enums\ServiceCodeEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'code',
        'action',
        'created_at',
        'updated_at',
    ];

    protected $casts = [
        'code' => ServiceCodeEnum::class,
        'action' => ServiceActionEnum::class,
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }
}

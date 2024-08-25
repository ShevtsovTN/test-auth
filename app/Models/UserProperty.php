<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Models\UserProperty
 *
 * @property int $user_id
 * @property string $key
 * @property string $value
 * @property-read User $user
 * @method static Builder|UserProperty newModelQuery()
 * @method static Builder|UserProperty newQuery()
 * @method static Builder|UserProperty query()
 * @method static Builder|UserProperty whereKey($value)
 * @method static Builder|UserProperty whereUserId($value)
 * @method static Builder|UserProperty whereValue($value)
 * @mixin \Eloquent
 */
class UserProperty extends Model
{
    protected $primaryKey = ['user_id', 'key'];

    public $incrementing = false;

    public $timestamps = false;

    protected $fillable = [
        'user_id',
        'key',
        'value',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}

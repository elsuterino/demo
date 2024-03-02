<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $slug
 * @property string $url
 * @property \Illuminate\Support\Carbon $expires_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 *
 * @method static \Database\Factories\TinyUrlFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|TinyUrl newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TinyUrl newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TinyUrl query()
 * @method static \Illuminate\Database\Eloquent\Builder|TinyUrl whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TinyUrl whereExpiresAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TinyUrl whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TinyUrl whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TinyUrl whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TinyUrl whereUrl($value)
 *
 * @mixin \Eloquent
 */
class TinyUrl extends Model
{
    use HasFactory;

    protected $casts = [
        'expires_at' => 'datetime',
    ];
}

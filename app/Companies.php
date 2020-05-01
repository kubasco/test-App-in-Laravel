<?php

namespace App;

use Barryvdh\LaravelIdeHelper\Eloquent;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Query\Builder;
use Illuminate\Notifications\DatabaseNotification;
use Illuminate\Notifications\DatabaseNotificationCollection;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Carbon;

/**
 * App\Companies
 *
 * @property int $id
 * @property string $name
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property Carbon|null $deleted_at
 * @property-read DatabaseNotificationCollection|DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read Collection|Positions[] $positions
 * @property-read int|null $positions_count
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Eloquent\Builder|Companies newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Companies newQuery()
 * @method static Builder|Companies onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Companies query()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|Companies whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Companies whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Companies whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Companies whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Companies whereUpdatedAt($value)
 * @method static Builder|Companies withTrashed()
 * @method static Builder|Companies withoutTrashed()
 * @mixin Eloquent
 */
class Companies extends Model
{
    use Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name'
    ];

    protected $dates = ['deleted_at'];

    protected $hidden = ['created_at', 'updated_at'];

    /**
     * @return HasMany
     */
    public function positions(): HasMany
    {
        return $this->hasMany(Positions::class);
    }
}

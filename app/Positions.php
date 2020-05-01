<?php

namespace App;

use Barryvdh\LaravelIdeHelper\Eloquent;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Query\Builder;
use Illuminate\Notifications\DatabaseNotification;
use Illuminate\Notifications\DatabaseNotificationCollection;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Carbon;

/**
 * App\Positions
 *
 * @property int $id
 * @property int $companies_id
 * @property string|null $reference
 * @property string $title
 * @property string $description
 * @property string $email
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property Carbon|null $deleted_at
 * @property-read Companies $company
 * @property-read DatabaseNotificationCollection|DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Eloquent\Builder|Positions newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Positions newQuery()
 * @method static Builder|Positions onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Positions query()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|Positions whereCompaniesId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Positions whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Positions whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Positions whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Positions whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Positions whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Positions whereReference($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Positions whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Positions whereUpdatedAt($value)
 * @method static Builder|Positions withTrashed()
 * @method static Builder|Positions withoutTrashed()
 * @mixin Eloquent
 */
class Positions extends Model
{
    use Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'companies_id', 'reference', 'title', 'description', 'email'
    ];

    protected $dates = ['deleted_at'];

    protected $hidden = ['created_at', 'updated_at'];

    /**
     * @return BelongsTo
     */
    public function company(): BelongsTo
    {
        return $this->belongsTo(Companies::class, 'companies_id');
    }
}

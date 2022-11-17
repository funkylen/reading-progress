<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\Book
 *
 * @property int $id
 * @property string $title
 * @property string $author
 * @property int $user_id
 * @property int $start_page
 * @property int $pages_count
 * @property boolean $is_finished
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\ReadLog[] $readLogs
 * @property-read int|null $read_logs_count
 * @property-read \App\Models\User $user
 * @method static \Database\Factories\BookFactory factory(...$parameters)
 * @method static Builder|Book finished()
 * @method static Builder|Book inProgress()
 * @method static Builder|Book newModelQuery()
 * @method static Builder|Book newQuery()
 * @method static \Illuminate\Database\Query\Builder|Book onlyTrashed()
 * @method static Builder|Book orderByLogActivity()
 * @method static Builder|Book query()
 * @method static Builder|Book whereAuthor($value)
 * @method static Builder|Book whereCreatedAt($value)
 * @method static Builder|Book whereDeletedAt($value)
 * @method static Builder|Book whereId($value)
 * @method static Builder|Book whereIsFinished($value)
 * @method static Builder|Book wherePagesCount($value)
 * @method static Builder|Book whereStartPage($value)
 * @method static Builder|Book whereTitle($value)
 * @method static Builder|Book whereUpdatedAt($value)
 * @method static Builder|Book whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|Book withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Book withoutTrashed()
 * @mixin \Eloquent
 * @method static Builder|Book list()
 */
class Book extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'title',
        'author',
        'user_id',
        'start_page',
        'pages_count',
        'is_finished',
        'last_read_at',
    ];

    protected $attributes = [
        'is_finished' => false,
    ];

    protected $casts = [
        'last_read_at' => 'datetime',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function readLogs(): HasMany
    {
        return $this->hasMany(ReadLog::class);
    }

    public function getCurrentPage(): int
    {
        if (!$this->relationLoaded('readLogs')) {
            throw new \Exception(__('Load relation first! Use ::with("readLogs").'));
        }

        return $this->start_page + $this->readLogs->sum('pages_count');
    }

    public function getPagesLeftCount(): int
    {
        return $this->pages_count - $this->getCurrentPage();
    }

    public function getProgressPercent(): float
    {
        if ($this->pages_count === 0) {
            return 0;
        }

        return round($this->getCurrentPage() * 100 / $this->pages_count, 2);
    }

    public function scopeFinished(Builder $query): void
    {
        $query->where('is_finished', true);
    }

    public function scopeInProgress(Builder $query): void
    {
        $query->where('is_finished', false);
    }
}

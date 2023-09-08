<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @mixin IdeHelperBook
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
    ];

    protected $attributes = [
        'is_finished' => false,
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

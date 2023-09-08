<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\ReadLog
 *
 * @property int $id
 * @property int $pages_count
 * @property int $book_id
 * @property \Illuminate\Support\Carbon $date
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\Book $book
 * @method static \Database\Factories\ReadLogFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|ReadLog newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ReadLog newQuery()
 * @method static \Illuminate\Database\Query\Builder|ReadLog onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|ReadLog query()
 * @method static \Illuminate\Database\Eloquent\Builder|ReadLog whereBookId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ReadLog whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ReadLog whereDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ReadLog whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ReadLog whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ReadLog wherePagesCount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ReadLog whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|ReadLog withTrashed()
 * @method static \Illuminate\Database\Query\Builder|ReadLog withoutTrashed()
 */
class ReadLog extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'book_id',
        'pages_count',
        'date',
    ];

    protected $casts = [
        'date' => 'date:d-m-Y',
        'pages_count' => 'integer',
    ];

    public function book(): BelongsTo
    {
        return $this->belongsTo(Book::class);
    }
}

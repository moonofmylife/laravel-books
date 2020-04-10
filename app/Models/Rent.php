<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Rent extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'book_id', 'renter_id', 'books_count', 'period', 'deposit'
    ];

    /**
     * The "booting" method of the model.
     *
     * @return void
     */
    public static function boot()
    {
        parent::boot();

        static::creating(function(Rent $rent) {
            $rent->setAttribute('expired_at', now()->addDays($rent->period));
        });
    }

    /**
     * Get renter of rent
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function renter()
    {
        return $this->belongsTo(Renter::class);
    }

    /**
     * Get book of rent
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function book()
    {
        return $this->belongsTo(Book::class);
    }

    /**
     * Scope a query to only active rents.
     *
     * @param Builder $query
     * @param int|null $limit
     * @return Builder|mixed
     */
    public function scopeActive(Builder $query)
    {
        return $query->whereDate('expired_at', '>', now());
    }

    /**
     * Get a localized updated date using Carbon
     *
     * @param string $value
     * @return string
     */
    public function getUpdatedAtAttribute($value)
    {
        return Carbon::parse($value)->isoFormat('D MMMM YYYY HH:mm');
    }

    /**
     * Get a localized expired date using Carbon
     *
     * @param string $value
     * @return string
     */
    public function getExpiredAtAttribute($value)
    {
        return Carbon::parse($value)->isoFormat('D MMMM YYYY HH:mm');
    }
}

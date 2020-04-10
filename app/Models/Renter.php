<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Renter extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'lastname', 'gender', 'email', 'favorite_books'
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'fullname', 'gender_name', 'illustration'
    ];

    /**
     * Attributes that are used for searching
     *
     * @var array
     */
    public static $searchable = [
        'name', 'lastname'
    ];

    /**
     * Get rented books
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function rents()
    {
        return $this->hasMany(Rent::class);
    }

    /**
     * Scope a query to get active readers with optional limit.
     *
     * @param Builder $query
     * @param int|null $limit
     * @return Builder|mixed
     */
    public function scopeActiveReaders(Builder $query, $limit = null)
    {
        return $query->withCount([
            'rents as rents_total',
            'rents as rents_active' => function (Builder $query) {
                $query->whereDate('expired_at', '>', now());
            }
        ])
            ->has('rents')
            ->when($limit, function (Builder $query) use ($limit) {
                $query->limit($limit);
            });
    }

    /**
     * Safe way to keep line breaks with caching of the original value
     *
     * @param $value
     */
    public function setFavoriteBooksAttribute($value)
    {
        $this->attributes['favorite_books'] = nl2br(e($value));
        $this->attributes['favorite_books_cached'] = $value;
    }

    /**
     * Get full name
     *
     * @return string
     */
    public function getFullnameAttribute()
    {
        return "{$this->name} {$this->lastname}";
    }

    /**
     * Get a localized gender
     *
     * @return array|\Illuminate\Contracts\Translation\Translator|string|null
     */
    public function getGenderNameAttribute()
    {
        return trans("models.renter.gender.{$this->gender}");
    }

    /**
     * Get an illustration path based on gender
     *
     * @return string
     */
    public function getIllustrationAttribute()
    {
        return asset("images/illustrations/{$this->gender}.svg");
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
}

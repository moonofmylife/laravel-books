<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Book extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'author', 'pages',
        'age_limit', 'year', 'cover',
        'cost', 'description'
    ];

    /**
     * Attributes that are used for searching
     *
     * @var array
     */
    public static $searchable = [
        'name', 'author'
    ];

    /**
     * The "booting" method of the model.
     *
     * @return void
     */
    public static function boot()
    {
        parent::boot();

        static::deleted(function(Book $book) {
            Storage::delete($book->cover);
        });
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
     * Get url to cover image
     *
     * @param $value
     * @return string
     */
    public function getCoverAttribute($value)
    {
        if (Storage::exists($value)) {
            return Storage::url($value);
        }

        return asset('images/illustrations/book_default.svg');
    }

    /**
     * Safe way to keep line breaks with caching of the original value
     *
     * @param $value
     */
    public function setDescriptionAttribute($value)
    {
        $this->attributes['description'] = nl2br(e($value));
        $this->attributes['description_cached'] = $value;
    }
}

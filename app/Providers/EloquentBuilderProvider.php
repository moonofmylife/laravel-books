<?php

namespace App\Providers;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Arr;
use Illuminate\Support\ServiceProvider;

class EloquentBuilderProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        Builder::macro('whereLike', function ($attributes, string $searchQuery) {
            $this->where(function (Builder $query) use ($attributes, $searchQuery) {
                foreach (Arr::wrap($attributes) as $attribute) {
                    foreach (explode(' ', $searchQuery) as $term) {
                        $query->orWhere($attribute, 'like', "%{$term}%");
                    }
                }
            });

            return $this;
        });
    }
}

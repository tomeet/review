<?php

namespace Tomeet\Reviews;

use Illuminate\Support\ServiceProvider;

class ReviewServiceProvider extends ServiceProvider
{

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(
            \dirname(__DIR__) . '/config/reviews.php',
            'reviews'
        );
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            \dirname(__DIR__) . '/config/reviews.php' => config_path('tomeet/reviews.php'),
        ], 'tomeet-review-config');

        $this->publishes([
            \dirname(__DIR__) . '/migrations/' => database_path('migrations'),
        ], 'tomeet-review-migration');
    }
}

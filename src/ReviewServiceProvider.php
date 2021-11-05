<?php

namespace Tomeet\Review;

use Illuminate\Support\ServiceProvider;

class ReviewServiceProvider extends ServiceProvider
{
    /**
     * 服务提供者加是否延迟加载.
     *
     * @var bool
     */
    protected $defer = true; // 延迟加载服务

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(
            \dirname(__DIR__) . '/config/review.php',
            'review'
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
            \dirname(__DIR__) . '/config/review.php' => config_path('review.php'),
            \dirname(__DIR__) . '/migrations/' => database_path('migrations'),
        ], 'tomeet-review');
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        // 因为延迟加载 所以要定义 provides 函数 具体参考laravel 文档
        return ['review'];
    }
}

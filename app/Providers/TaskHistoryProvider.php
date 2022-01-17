<?php

namespace App\Providers;

use App\Services\TaskHistory\TaskHistory;
use Illuminate\Support\ServiceProvider;

class TaskHistoryProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('TaskHistory',TaskHistory::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}

<?php

namespace TaskApp;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class TaskServiceProvider extends ServiceProvider
{
    public function register()
    {
        //
    }
    public function boot()
    {
        //load migration
        $this->loadMigrationsFrom([
            base_path('task_app/migrations')
        ]);
        //load views
        $this->loadViewsFrom(base_path('task_app/views'), 'Task');
        //load routes
        Route::middleware('web')
            ->group(base_path('task_app/task_route.php'));
    }
}

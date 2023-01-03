<?php

namespace TaskApp;

use App\Models\User;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use Imanghafoori\HeyMan\Facades\HeyMan;

class TaskServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/config.php', 'task');
    }
    public function boot()
    {
        //check auth user
        AuthMiddleware::install('tasks.*');

        User::resolveRelationUsing('tasks', function () {
            return $this->hasMany(Task::class);
        });
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

<?php

namespace TaskApp\ProtectionLayers;

use Imanghafoori\HeyMan\Facades\HeyMan;
use TaskApp\DB\TaskStore;
use TaskApp\Task;

class PreventToManyTasks
{
    public static function install()
    {
        HeyMan::onCheckPoint('tasks.store')
            ->thisMethodShouldAllow([static::class, 'exceedsAffordableTasks'])
            ->otherwise()
            ->weRespondFrom([static::class, 'response']);
    }

    public static function response(): \Illuminate\Http\RedirectResponse
    {
        return redirect()
            ->route('tasks.index')
            ->with('error', 'you can not create too many daily tasks');
    }

    public static function exceedsAffordableTasks()
    {
        return TaskStore::countTask(auth()->id()) < config('task.max_tasks');
    }
}

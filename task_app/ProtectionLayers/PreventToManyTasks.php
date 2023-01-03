<?php

namespace TaskApp\ProtectionLayers;

use Imanghafoori\HeyMan\Facades\HeyMan;
use TaskApp\DB\TaskStore;
use TaskApp\Task;

class PreventToManyTasks
{
    public static function install()
    {
        HeyMan::onRoute('tasks.store')
            ->thisMethodShouldAllow(static::class, (array)'exceedsAffordableTasks')
            ->otherwise()
            ->weRespondeForm(static::class, 'response');
    }

    public static function response(): \Illuminate\Http\RedirectResponse
    {
        return redirect()
            ->route('tasks.index')
            ->with('error', 'you can not create too many daily tasks');
    }

    public static function exceedsAffordableTasks(): bool
    {
        return TaskStore::countTask(auth()->id()) > config('task.max_task');
    }
}

<?php

namespace TaskApp\ProtectionLayers;

use Imanghafoori\HeyMan\Facades\HeyMan;
use TaskApp\DB\TaskStore;
use TaskApp\Task;
use TaskApp\TaskStoreResponses\Responses;

class PreventToManyTasks
{
    public static function install()
    {
        HeyMan::onCheckPoint('tasks.store')
            ->thisMethodShouldAllow([static::class, 'exceedsAffordableTasks'])
            ->otherwise()
            ->weRespondFrom([Responses::class, 'tooManyTasksError']);
    }



    public static function exceedsAffordableTasks()
    {
        return TaskStore::countTask(auth()->id()) < config('task.max_tasks');
    }
}

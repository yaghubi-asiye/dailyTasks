<?php

namespace TaskApp\DB;

use DB;
use Exception;
use Imanghafoori\Middlewarize\Middlewarable;
use TaskApp\Task;

class TaskStore
{
    use Middlewarable;

    /**
     * @throws Exception
     */

    public static function store($data, $userId)
    {
        try {

            $task = Task::query()->create($data + ['user_id' => $userId]);
        }
        catch ( Exception $e){

            return  nullable(null);

        }
        if(! $task->exists) {

            return nullable(null);
        }

        return  nullable($task);

    }

    public static function countTask($userId)
    {
        return Task::where('user_id', $userId)->count();
    }
}

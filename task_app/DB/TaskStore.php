<?php

namespace TaskApp\DB;

use DB;
use TaskApp\Task;

class TaskStore
{
    /**
     * @throws \Exception
     */
    public static function store($data, $userId)
    {
        try {
            DB::beginTransaction();
            $task = Task::query()->create($data + ['user_id' => $userId]);
        }
        catch ( \Exception $e){
            DB::rollBack();
            return  nullable(null);

        }
        if(! $task->exists) {
            DB::rollBack();
            return nullable(null);
        }
        DB::commit();
        return  nullable($task);

    }

    public static function countTask($userId)
    {
        return Task::where('user_id', $userId)->count();
    }
}

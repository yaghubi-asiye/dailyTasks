<?php

namespace TaskApp\DB;

use TaskApp\Task;

class TaskStore
{
    public static function store($data, $userId)
    {
        $task = Task::create($data + ['user_id' => $userId]);
    }

    public static function countTask($userId)
    {
        return Task::where('user_id', $userId)->count();
    }
}

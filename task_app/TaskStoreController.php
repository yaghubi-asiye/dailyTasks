<?php

namespace TaskApp;

use Imanghafoori\HeyMan\Facades\HeyMan;
use Imanghafoori\HeyMan\StartGuarding;
use TaskApp\DB\TaskStore;
use TaskApp\ProtectionLayers\PreventToManyTasks;
use TaskApp\ProtectionLayers\ValidateForm;

class TaskStoreController
{
    public  function  __construct()
    {
        PreventToManyTasks::install();
        ValidateForm::install();
        StoreTempState::install();
        resolve(StartGuarding::class)->start();
    }

    public  function store()
    {
        HeyMan::checkPoint('tasks.store');
        $data = request()->only(['title', 'description']);

        $nullableTask = TaskStore::store($data, auth()->id());
        $task = $nullableTask->getOrSend(function () {
            return redirect()->route('tasks.index')->with('error', 'Task was not created');
        });
        return redirect()->route('tasks.index')->with('success', 'Task created');
    }


}

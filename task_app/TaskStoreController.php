<?php

namespace TaskApp;

use Imanghafoori\HeyMan\Facades\HeyMan;
use Imanghafoori\HeyMan\StartGuarding;
use TaskApp\DB\TaskStore;
use TaskApp\DB\Transactioner;
use TaskApp\ProtectionLayers\PreventToManyTasks;
use TaskApp\ProtectionLayers\ValidateForm;
use TaskApp\TaskStoreResponses\HtmlyResponses;

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

        $task = TaskStore::middlewared([Transactioner::class])
            ->store($data, auth()->id())
            ->getOrSend([HtmlyResponses::class, 'failed']);

        return HtmlyResponses::success();
    }


}

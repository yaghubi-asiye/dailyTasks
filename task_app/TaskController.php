<?php

namespace TaskApp;

use Imanghafoori\HeyMan\Facades\HeyMan;
use Imanghafoori\HeyMan\StartGuarding;
use TaskApp\DB\TaskStore;
use TaskApp\ProtectionLayers\PreventToManyTasks;
use TaskApp\ProtectionLayers\ValidateForm;

class TaskController
{
    public  function  __construct()
    {
        PreventToManyTasks::install();
        ValidateForm::install();
        resolve(StartGuarding::class)->start();
    }

    public  function store()
    {
        HeyMan::checkPoint('tasks.store');
        $data = request()->only(['title', 'description']);
        $task = TaskStore::store($data, auth()->id());

        return redirect()->route('tasks.index')->with('success', 'Task created');
    }

    public  function index()
    {

    }
    public  function create()
    {

    }
    public  function edit()
    {

    }

    public  function update()
    {

    }
    public  function delete()
    {

    }
}

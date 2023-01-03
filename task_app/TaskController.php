<?php

namespace TaskApp;

use TaskApp\DB\TaskStore;

class TaskController
{
    public  function index()
    {

    }
    public  function create()
    {

    }
    public  function store()
    {
        $data = request()->only(['name', 'description']);
        TaskStore::store($data, auth()->id());

        return redirect()->route('tasks.index')->with('success', 'Task created');
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

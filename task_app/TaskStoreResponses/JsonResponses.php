<?php

namespace TaskApp\TaskStoreResponses;

class JsonResponses
{
    public  function failed()
    {
        return response()
            ->json(['error'=> 'Task was not created'], 400);
    }
    public function success()
    {
        return response()
            ->json(['success'=>'Task created'], 201);
    }
    public function tooManyTasksError()
    {
        return response()
            ->json(['error'=>'you can not create too many daily tasks'], 400);
    }
}

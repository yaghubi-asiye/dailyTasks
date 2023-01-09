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

    public function userBlocked($seconds)
    {
        return response()->json([
            'tampering with url data will result in a temporary ban.(!_!)',
            'you are banned for: '.$seconds.'(sec)'
        ], 401);
    }
}

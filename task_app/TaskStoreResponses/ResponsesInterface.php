<?php

namespace TaskApp\TaskStoreResponses;

interface ResponsesInterface
{
    public  function failed();
    public function success();
    public function tooManyTasksError();

    public function userBlocked($seconds);

}

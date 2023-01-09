<?php
namespace TaskApp\TaskStoreResponses;
class HtmlyResponses
{
    public  function failed()
    {
        return redirect()->route('tasks.index')
            ->with('error', 'Task was not created');
    }
    public function success()
    {
        return redirect()->route('tasks.index')
            ->with('success', 'Task created');
    }
    public function tooManyTasksError()
    {
        return redirect()
            ->route('tasks.index')
            ->with('error', 'you can not create too many daily tasks');
    }

    public function userBlocked($seconds)
    {
        return redirect()
            ->route('tasks.index')
            ->withErrors([
                'tampering with url data will result in a temporary ban.(!_!)',
                'you are banned for : '.$seconds.'(sec)'
            ]);
    }
}

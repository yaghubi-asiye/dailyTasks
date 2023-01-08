<?php
namespace TaskApp\TaskStoreResponses;
class HtmlyResponses
{
    public static  function failed()
    {
        return redirect()->route('tasks.index')
            ->with('error', 'Task was not created');
    }
    public static function success()
    {
        return redirect()->route('tasks.index')
            ->with('success', 'Task created');
    }
    public  static function tooManyTasksError()
    {
        return redirect()
            ->route('tasks.index')
            ->with('error', 'you can not create too many daily tasks');
    }
}

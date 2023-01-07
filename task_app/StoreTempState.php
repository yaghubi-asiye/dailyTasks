<?php

namespace TaskApp;

class StoreTempState
{
    public  static  function install() {
        Task::created(function ($task) {
            tempTags($task)->tagIt('state', now()->endOfDay(), ['value' => request('state')]);
        });

        Task::deleting(function ($task) {
            tempTags($task)->unTag();
        });
    }
}

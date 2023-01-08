<?php

namespace TaskApp\TaskStoreResponses;

use Illuminate\Support\Facades\Facade;

class Responses extends Facade
{
    protected static function getFacadeAccessor()
    {
        $client = request('client');
        $class = [
            'android' => JsonResponses::class,
            'web' => HtmlyResponses::class,
        ][$client] ?? HtmlyResponses::class;
        return $class;
    }
}
